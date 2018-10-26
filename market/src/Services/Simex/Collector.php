<?php

namespace WincoCrypto\Services\Simex;

use GuzzleHttp\Client;
use WincoCrypto\Helpers\Utils;
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
        $this->client = new Client(['base_uri' => 'https://simex.global/api/']);
        $this->getStockInfo();
    }

    public function getStockInfo()
    {
        $response = $this->client->request('GET', 'pairs');

        $data = json_decode($response->getBody());

        $data = Utils::toArray($data->data);

        $wincoData = null;

        foreach (array_values(array_column(array_column($data, 'base'), 'name')) as $key => $value) {
            if ($value == 'WCO') {
                if ($data[$key]['quote']['name'] == 'BTC') {
                    $wincoData = $data[$key];
                }
            }
        }

        if ($key) {
            $this->bid = $wincoData['buy_price'];
            $this->ask = $wincoData['sell_price'];
            $this->last = $wincoData['last_price'];
            $this->variation24hr = $wincoData['change_percent'];
            $this->volume24hr = $wincoData['base_volume'];
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
