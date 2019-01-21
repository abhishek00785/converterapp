<?php

namespace Abhishek Mishra\CurrencyConverter;

use Abhishek Mishra\CurrencyConverter\Converters\Google;
use Abhishek Mishra\CurrencyConverter\Converters\Yahoo;
use Abhishek Mishra\CurrencyConverter\Converters\CurrencyConverterApi;
use Abhishek Mishra\CurrencyConverter\Exceptions\DriverNotFoundException;

class ConverterManager
{
    public static $drivers = [
        'google'                 => Google::class,
        'yahoo'                  => Yahoo::class,
        'currency_converter_api' => CurrencyConverterApi::class,
    ];
    
   
    public static function registerDriver($name, $driverClass)
    {
        if (!array_key_exists($name, self::$drivers)) {
            self::$drivers[$name] = $driverClass;
        }
    }
    
   
    public static function findByName($name)
    {
        if (!array_key_exists($name, self::$drivers)) {
            throw new DriverNotFoundException("Driver [$name] not known!");
        }
        
        return self::$drivers[$name];
    }
    
    
    private static function buildConverter($driverClass, $config)
    {
        $reflectionClass = new \ReflectionClass($driverClass);
        
        return $reflectionClass->newInstanceArgs([$config]);
    }
    
    
    public static function makeByName($name, $config = [])
    {
        $driverClass = self::findByName($name);
        
        return self::buildConverter($driverClass, $config);
    }
}
