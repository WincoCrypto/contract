<?php

namespace Winco\Market;

use Winco\Exchanges as Exchanges;
use Winco\Services\FourteenBit\Collector as FourteenBit;
use Winco\Services\SouthXchange\Collector as SouthXchange;

class Summary
{
    private $fourteen;
    private $south;

    public function __construct()
    {
        $this->fourteen = new FourteenBit();
        $this->south = new SouthXchange();
    }

    public function getBid()
    {
        $ft = $this->fourteen->getBid();
        $st = $this->south->getBid();

        return $this->populateData('bid', $ft, $st);
    }

    public function getAsk()
    {
        $ft = $this->fourteen->getAsk();
        $st = $this->south->getAsk();

        return $this->populateData('ask', $ft, $st);
    }

    public function getLast()
    {
        $ft = $this->fourteen->getLast();
        $st = $this->south->getLast();

        return $this->populateData('last', $ft, $st);
    }

    public function getVariation()
    {
        $ft = $this->fourteen->getVariation();
        $st = $this->south->getVariation();

        return $this->populateData('variation', $ft, $st);
    }

    public function getVolume()
    {
        $ft = $this->fourteen->getVolume();
        $st = $this->south->getVolume();

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
