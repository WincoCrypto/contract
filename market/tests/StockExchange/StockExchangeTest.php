<?php

use PHPUnit\Framework\TestCase;
use Winco\Market\StockExchange\Collector as StockExchange;

class StockExchangeTest extends TestCase
{
    protected static $stock;

    public static function setUpBeforeClass()
    {
        self::$stock = new StockExchange();
    }

    public function testGetBid()
    {
        $this->assertEquals('double', gettype(self::$stock->getBid()));
    }

    public function testGetAsk()
    {
        $this->assertEquals('double', gettype(self::$stock->getAsk()));
    }

    public function testGetLast()
    {
        $this->assertEquals('double', gettype(self::$stock->getLast()));
    }

    public function testGetVariation()
    {
        $this->assertEquals('double', gettype(self::$stock->getVariation()));
    }

    public function testGetVolume()
    {
        $this->assertEquals('double', gettype(self::$stock->getVolume()));
    }

}