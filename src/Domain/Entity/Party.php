<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Party is the group of adventurers. It follows group pattern.
 * @package Mikron\HubFront\Domain\Entity
 */
class Party extends BagOfAttributes
{
    function choosePattern()
    {
        return 'group';
    }
}
