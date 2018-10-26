<?php

use PHPUnit\Framework\TestCase;
use WincoCrypto\Services\Simex\Collector as Simex;

class SimexTest extends TestCase
{
    protected static $simex;

    public static function setUpBeforeClass()
    {
        self::$simex = new Simex();
    }

    public function testGetBid()
    {
        $this->assertTrue(is_numeric(self::$simex->getBid()));
    }

    public function testGetAsk()
    {
        $this->assertTrue(is_numeric(self::$simex->getAsk()));
    }

    public function testGetLast()
    {
        $this->assertTrue(is_numeric(self::$simex->getLast()));
    }

    public function testGetVariation()
    {
        $this->assertTrue(is_numeric(self::$simex->getVariation()));
    }

    public function testGetVolume()
    {
        $this->assertTrue(is_numeric(self::$simex->getVolume()));
    }

}