<?php

namespace Winco\Services\SouthXchange;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Collector
{
    private $client;
    private $bid;
    private $ask;
    private $last;
    private $variation24hr;
    private $volume24hr;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://www.southxchange.com/api/']);
        $this->getStockInfo();
    }

    public function getStockInfo()
    {
        $response = $this->client->request('GET', 'price/WCO/BTC');

        $data = json_decode($response->getBody());

        $this->bid = $data->Bid;
        $this->ask = $data->Ask;
        $this->last = $data->Last;
        $this->variation24hr = $data->Variation24Hr;
        $this->volume24hr = $data->Volume24Hr;
    }
    
    public function getBid()
    {
        return $this->bid;
    }

    public function getAsk()
    {
        return $this->ask;
    }

    public function getLast()
    {
        return $this->last;
    }

    public function getVariation()
    {
        return $this->variation24hr;
    }
    
    public function getVolume()
    {
        return $this->volume24hr;
    }
}