<?php
    require_once __DIR__ . '/vendor/autoload.php';

    use WincoCrypto\Services\Simex\Collector as Summary;

    $summary = new Summary();

    $data = [    
        'getBid' => $summary->getBid(),
        'getAsk' => $summary->getAsk(),
        'getLast' => $summary->getLast(),
        'getVariation' => $summary->getVariation(),
        'getVolume' => $summary->getVolume()
    ];

    print_r($data);