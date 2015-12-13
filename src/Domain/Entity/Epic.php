<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class Epic - contains data regarding entire campaign / epic
 * @package Mikron\HubFront\Domain\Entity
 */
class Epic extends BagOfAttributes
{
    /**
     * @return array Attribute labels with their default values
     */
    function createData()
    {
        return [
            "name" => "", // epic name
            "current" => [], // current story
            "stories" => [], // stories description
            "help" => [], // help boxes
        ];
    }
}
