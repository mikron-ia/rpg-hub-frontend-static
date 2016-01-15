<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Story contains data regarding a discrete piece of the plot - story, mission, or similar component
 * @package Mikron\HubFront\Domain\Entity
 */
class Story extends BagOfAttributes
{
    function choosePattern()
    {
        return 'story';
    }
}
