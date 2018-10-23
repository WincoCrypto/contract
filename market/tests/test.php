<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Winco\Market\FourteenBit\Collector as Fourteen;

$c = new Fourteen();

echo $c->getBid() . "\n";
echo $c->getAsk() . "\n";
echo $c->getLast() . "\n";
echo $c->getVariation() . "\n";
echo $c->getVolume() . "\n";
echo "\n";
