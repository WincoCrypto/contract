<?php

use PHPUnit\Framework\TestCase;
use Winco\Services\FourteenBit\Collector as FourteenBit;

class FourteenBitTest extends TestCase
{
    protected static $bit;

    public static function setUpBeforeClass()
    {
        self::$bit = new FourteenBit();
    }

    public function testGetBid()
    {
        $this->assertTrue(is_numeric(self::$bit->getBid()));
    }

    public function testGetAsk()
    {
        $this->assertTrue(is_numeric(self::$bit->getAsk()));
    }

    public function testGetLast()
    {
        $this->assertTrue(is_numeric(self::$bit->getLast()));
    }

    public function testGetVariation()
    {
        $this->assertTrue(is_numeric(self::$bit->getVariation()));
    }

    public function testGetVolume()
    {
        $this->assertTrue(is_numeric(self::$bit->getVolume()));
    }

}