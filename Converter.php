<?php

namespace Abhishek Mishra\CurrencyConverter\Converters;

abstract class Converter
{
   
    private $base_url;
    
    
    public function __construct($config = [])
    {
        $this->base_url = array_get($config, 'base_url', $this->base_url);
    }
    
    
    abstract public function convert($from, $to, $amount);
}
