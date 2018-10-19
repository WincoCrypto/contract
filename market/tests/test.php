<?php

require_once __DIR__ . '/../vendor/autoload.php';

use StockExchange\StockExchange;

echo StockExchange::getVolume() . "\n";
