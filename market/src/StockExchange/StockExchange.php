<?php

namespace StockExchange;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class StockExchange
{
    private $client;

    public function __construct()
    {
    }

    public function getVolume()
    {
        $client = new GuzzleHttp\Client(['base_uri' => 'https://www.southxchange.com/api/']);

        $response = $client->request('GET', 'book/WCO/BTC');
        
        return $response->getBody();
    }
}