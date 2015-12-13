<?php
/**
 * Created by PhpStorm.
 * User: Wilk
 * Date: 2015-12-13
 * Time: 11:13
 */

namespace Mikron\HubFront\Domain\Entity;


class Story extends BagOfAttributes
{
    /**
     * @return array Attribute labels with their default values
     */
    function createData()
    {
        return [
            "name" => "", // story name
            "key" => "", // story key
            "parameters" => [], // details
            "short" => "", // recap
            "long" => "", // full
        ];
    }
}
