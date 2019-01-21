<?php

if (!function_exists('array_get')) {
    
    function array_get(array $ary, $key, $default = null)
    {
        return !empty($ary[$key]) ? $ary[$key] : $default;
    }
}

if (!function_exists('printHelp')) {
   
    function printHelp()
    {
        echo "usage: FIXME!\n";
    }
}