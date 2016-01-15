<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class Epic - contains data regarding entire campaign / epic
 * @package Mikron\HubFront\Domain\Entity
 */
class Epic extends BagOfAttributes
{
    function choosePattern()
    {
        return 'epic';
    }
}
