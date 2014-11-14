<?php

namespace DoctrineMoneyModule\Hydrator;

use Zend\Stdlib\Hydrator\HydratorInterface;
use Money\Money;
use Money\Currency;

/**
 * Hydrator for Money object
 *
 * @author Fábio Carneiro <fahecs@gmail.com>
 * @license MIT
 */
class MoneyHydrator implements HydratorInterface
{

    public function extract($object)
    {
        return [
            'amount' => $object->getAmount(),
            'currency' => $object->getCurrency()->getName()
        ];
    }

    public function hydrate(array $data, $object)
    {
        return new Money(
            $data['amount'],
            new Currency($data['currency'])
        );
    }
}
