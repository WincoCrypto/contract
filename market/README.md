# Winco Market Component

Winco market is a PHP library that provides information about Winco cryptocurrency in exchanges which trade it, making the life easier to get information about volume, variation, last price, etc.


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

Using the summary class you may get the volume sum of all exchanges available, the best bid and ask for the currency and others.
In order to use the functions is necessary import the class Summary:

```
use WincoCrypto\Market\Summary as Summary;

$summary = new Summary();
```

#### Get Volume

This method provides the Winco volume sum of all exchanges available.

```
$volume = $summary->getVolume();
```

#### Get the greater bid

This method provides the Winco greater bid and its respective exchange.

```
$bid = $summary->getBid();
```

#### Get the lower ask

This method provides the Winco lower ask and its respective exchange.

```
$ask = $summary->getAsk();
```

#### Get the higher last price

This method provides the Winco higher last price and its respective exchange.

```
$last = $summary->getLast();
```

#### Get the higher variation

This method provides the Winco higher variation and its respective exchange.

```
$variation = $summary->getVariation();
```

### Collect data from a specific exchange

To collect information from a specific exchange, it is possible by calling the same methods from the `Summary` class, but from their own classes. For now the available exchanges are:

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

Any question or improvements proposal, please e-mail WincoCrypto by support@winco.io
