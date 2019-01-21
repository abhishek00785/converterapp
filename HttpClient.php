<?php

namespace Abhishek Mishra\CurrencyConverter\Services;

class HttpClient
{
    
    private $url;
    
    
    private $headers;
    
    
    private $method;
    
   
    public function __construct($url, $method = 'GET', $headers = [])
    {
        $this->url     = $url;
        $this->headers = $headers;
        $this->method  = $method;
    }
    
    
    public function run()
    {
        $ch  = curl_init();
        $url = $this->url;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->method);
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
    
}
