<?php

namespace Abhishek Mishra\CurrencyConverter\Converters;

use Abhishek Mishra\CurrencyConverter\Services\HttpClient;

class CurrencyConverterApi extends Converter
{
    
    private $base_url = 'http://free.currencyconverterapi.com/api/v3';


    
    public function convert($from, $to, $amount)
    {
        $endpoint = '/convert';
        $query    = $from . '_' . $to;
        $url      = $this->base_url . $endpoint .'?' . http_build_query(['q' => $query, 'compact' => 'ultra']);
        $client   = new HttpClient($url);
        $request_result = $client->run();
        $json = json_decode($request_result, true);
        $rate = $json[$query];
        return (float) $rate * $amount;
    }
}


