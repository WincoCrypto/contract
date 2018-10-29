<?php

namespace WincoCrypto\Market;

use WincoCrypto\Exchanges as Exchanges;
use WincoCrypto\Services\Simex\Collector as Simex;
use WincoCrypto\Services\FourteenBit\Collector as FourteenBit;
use WincoCrypto\Services\SouthXchange\Collector as SouthXchange;

class Summary
{
    private $simex;
    private $south;
    private $fourteen;

    public function __construct()
    {
        $this->simex = new Simex();
        $this->south = new SouthXchange();
        $this->fourteen = new FourteenBit();
    }

    public function getBid()
    {
        $sx = $this->simex->getBid();
        $st = $this->south->getBid();
        $ft = $this->fourteen->getBid();

        return $this->populateData('bid', $ft, $st);
    }

    public function getAsk()
    {
        $sx = $this->simex->getAsk();
        $st = $this->south->getAsk();
        $ft = $this->fourteen->getAsk();

        return $this->populateData('ask', $ft, $st);
    }

    public function getLast()
    {
        $sx = $this->simex->getLast();
        $st = $this->south->getLast();
        $ft = $this->fourteen->getLast();

        return $this->populateData('last', $ft, $st);
    }

    public function getVariation()
    {
        $sx = $this->simex->getVariation();
        $st = $this->south->getVariation();
        $ft = $this->fourteen->getVariation();

        return $this->populateData('variation', $ft, $st);
    }

    public function getVolume()
    {
        $sx = $this->simex->getVolume();
        $st = $this->south->getVolume();
        $ft = $this->fourteen->getVolume();

        return $ft + $st;
    }

    private function populateData($goal = null, $ft, $st)
    {
        $goal = strtolower($goal);

        $data = [
            'amount' => 0,
            'from' => 'nowhere'
        ];

        if (in_array($goal, ['bid', 'last', 'variation'])) {
            if ($ft > $st) {
                $data['amount'] = $ft;
                $data['from'] = Exchanges::FOURTEEN_BIT;
            } else {
                $data['amount'] = $st;
                $data['from'] = Exchanges::SOUTHXCHANGE;
            }
        } elseif ($goal == 'ask') {
            if ($ft < $st) {
                $data['amount'] = $ft;
                $data['from'] = Exchanges::FOURTEEN_BIT;
            } else {
                $data['amount'] = $st;
                $data['from'] = Exchanges::SOUTHXCHANGE;
            }
        }

        return $data;
    }
}
