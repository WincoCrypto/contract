<?php

namespace Winco\Services\FourteenBit;

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
        $this->client = new Client(['base_uri' => 'https://14bit.com/api/']);
        $this->getStockInfo();
    }

    public function getStockInfo()
    {
        $response = $this->client->request('GET', 'market');

        $data = json_decode($response->getBody());

        $key = array_search('BTC/WCO', array_column($data, 'market'));

        if ($key) {
            $this->bid = $data[$key]->bid;
            $this->ask = $data[$key]->ask;
            $this->last = $data[$key]->last;
            $this->variation24hr = $data[$key]->variation24hr;
            $this->volume24hr = $data[$key]->volume24hr;
        }
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
