<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class Person
 * @package Mikron\HubFront\Domain\Entity
 */
class Person extends BagOfAttributes
{
    /**
     * @return string Pattern key
     */
    protected function choosePattern()
    {
        return 'person';
    }
}
