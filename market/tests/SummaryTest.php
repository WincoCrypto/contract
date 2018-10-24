<?php

use PHPUnit\Framework\TestCase;
use WincoCrypto\Exchanges as Exchanges;
use WincoCrypto\Market\Summary as Summary;

class SummaryTest extends TestCase
{
    protected static $sum;

    public static function setUpBeforeClass()
    {
        self::$sum = new Summary();
    }

    public function testGetBid()
    {
        $bid = self::$sum->getBid();

        $this->assertArrayHasKey('amount', $bid);
        $this->assertArrayHasKey('from', $bid);
        $this->assertTrue(is_numeric($bid['amount']));
        $this->assertTrue(in_array($bid['from'], [Exchanges::FOURTEEN_BIT, Exchanges::SOUTHXCHANGE]));
    }

    public function testGetAsk()
    {
        $ask = self::$sum->getAsk();

        $this->assertArrayHasKey('amount', $ask);
        $this->assertArrayHasKey('from', $ask);
        $this->assertTrue(is_numeric($ask['amount']));
        $this->assertTrue(in_array($ask['from'], [Exchanges::FOURTEEN_BIT, Exchanges::SOUTHXCHANGE]));
    }

    public function testGetLast()
    {
        $last = self::$sum->getLast();

        $this->assertArrayHasKey('amount', $last);
        $this->assertArrayHasKey('from', $last);
        $this->assertTrue(is_numeric($last['amount']));
        $this->assertTrue(in_array($last['from'], [Exchanges::FOURTEEN_BIT, Exchanges::SOUTHXCHANGE]));
    }

    public function testGetVariation()
    {
        $var = self::$sum->getVariation();

        $this->assertArrayHasKey('amount', $var);
        $this->assertArrayHasKey('from', $var);
        $this->assertTrue(is_numeric($var['amount']));
        $this->assertTrue(in_array($var['from'], [Exchanges::FOURTEEN_BIT, Exchanges::SOUTHXCHANGE]));
    }

    public function testGetVolume()
    {
        $this->assertTrue(is_numeric(self::$sum->getVolume()));
    }

}