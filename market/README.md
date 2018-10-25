# Winco Market Library

The Winco market is a PHP library that provides information about Winco´s cryptocurrency in exchanges where it is traded, to create easier access to obtain information such as volume, variation, last price, etc.

## Installation

```
composer require wincocrypto/market
```
```
{
    "require": {
        "wincocrypto/market": "^1.0"
    }
}
```

```
<?php
    require_once __DIR__ . ’/vendor/autoload.php’;
    use WincoCrypto\Market\Summary as Summary;
    $summary = new Summary();
    $volume = $summary->getVolume();
    echo $volume;
```

## Methods

### Summary

By using the class Summary, you will get the volume sum of all exchanges available, the best bid, the ask price and additional information for the currency.
In order to use the functions it is necessary to import the class Summary:

```
use WincoCrypto\Market\Summary as Summary;
$summary = new Summary();
```

#### Get Volume

This method provides the Winco´s volume sum of all exchanges available.

```
$volume = $summary->getVolume();
```

#### Get the highest bid

This method provides the Winco´s highest bid and its respective exchange.

```
$bid = $summary->getBid();
```

#### Get the lowest ask price

This method provides the Winco´s lowest ask price and its respective exchange.

```
$ask = $summary->getAsk();
```

#### Get the highest last price

This method provides the Winco´s highest last price and its respective exchange.

```
$last = $summary->getLast();
```

#### Get the highest variation

This method provides the Winco´s highest variation and its respective exchange.

```
$variation = $summary->getVariation();
```

### Collect data from a specific exchange

To collect information from a specific exchange, it is possible by calling the same methods from the class `Summary, but by their own classes. For now, the available exchanges are:

#### 14Bit

```
use WincoCrypto\Services\FourteenBit\Collector as FourteenBit;
$ftBit = new FourteenBit();
```

#### SouthXchange

```
use WincoCrypto\Services\SouthXchange\Collector as SouthXchange;
$south = new SouthXchange();
```

## Contact 

If you have any questions or improvement proposals, please e-mail Winco´s support team at support@winco.io