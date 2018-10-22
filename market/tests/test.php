<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Winco\Market\StockExchange\Collector as StockExchange;

$exchange = new StockExchange();

echo $exchange->getVolume() . "\n";

