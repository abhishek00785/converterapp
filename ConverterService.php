<?php

namespace Abhishek Mishra\CurrencyConverter;

use Abhishek Mishra\CurrencyConverter\ConverterManager;

class ConverterService
{
    
    private $driver;

    
    public function __construct($driver = 'google')
    {
        $this->driver = $this->makeDriver($driver);
    }

    
    private function makeDriver($driver)
    {
        return ConverterManager::makeByName($driver);
    }

   
    public function convert($from, $to, $amount)
    {
        return $this->driver->convert($from, $to, $amount);
    }
}
