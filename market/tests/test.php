<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Winco\Market\Summary;

$c = new Summary();

$data = [
    'bid' => $c->getBid(),
    'ask' => $c->getAsk(),
    'last' => $c->getLast(),
    'variation' => $c->getVariation(),
    'volume' => $c->getVolume()
];

print_r($data);
echo "\n";
