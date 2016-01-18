<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class Character - contains basic data regarding the character
 * @package Mikron\HubFront\Domain\Entity
 */
class Character extends BagOfAttributes
{
    protected function choosePattern()
    {
        return 'character';
    }
}
