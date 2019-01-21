<?php

namespace Abhishek Mishra\CurrencyConverter\Converters;

use Abhishek Mishra\CurrencyConverter\Services\HttpClient;

class Google extends Converter
{
   
    private $base_url = 'http://www.google.com/finance/converter';
    
    
    
    public function convert($from, $to, $amount)
    {
        $url = $this->base_url . '?' . http_build_query(['a' => $amount, 'from' => $from, 'to' => $to]);
        
        $client         = new HttpClient($url);
        $request_result = $client->run();
        
        $data = explode('bld>', $request_result);
        $data = (!empty($data[1]) && !empty(explode($to, $data[1]))) ? explode($to, $data[1]) : ['0.00'];
        
        return round($data[0], 4);
    }
}
