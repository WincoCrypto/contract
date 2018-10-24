<?php

use PHPUnit\Framework\TestCase;
use Winco\Services\StockExchange\Collector as StockExchange;

class StockExchangeTest extends TestCase
{
    protected static $stock;

    public static function setUpBeforeClass()
    {
        self::$stock = new StockExchange();
    }

    public function testGetBid()
    {
        $this->assertTrue(is_numeric(self::$stock->getBid()));
    }

    public function testGetAsk()
    {
        $this->assertTrue(is_numeric(self::$stock->getAsk()));
    }

    public function testGetLast()
    {
        $this->assertTrue(is_numeric(self::$stock->getLast()));
    }

    public function testGetVariation()
    {
        $this->assertTrue(is_numeric(self::$stock->getVariation()));
    }

    public function testGetVolume()
    {
        $this->assertTrue(is_numeric(self::$stock->getVolume()));
    }

}