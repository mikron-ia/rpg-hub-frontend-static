<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class Character - contains basic data regarding the character
 * @package Mikron\HubFront\Domain\Entity
 * @todo Split it into correct and neat universal domain
 */
class Character extends BagOfAttributes
{
    function createData()
    {
        return [
            'advantages' => [], // traits - advantages & disadvantages
            'attributes' => [], // basic attributes
            'basics' => [], // names, descriptions, etc.
            'catches' => [], // catches: backgrounds, motivations...
            'contacts' => [], // friends & allies
            'damage' => [], // more permanent damage
            'defences' => [], // hit difficulties
            'description' => "", // basic description
            'descriptions' => [], // descriptions detailed
            'development' => [], // development history
            'equipment' => [], // items on person
            'expenses' => [], // regular expenses
            'income' => [], // regular income
            'languages' => [], // languages known
            'money' => [], // cash at hand
            'name' => "", // used name
            'public' => [], // public information
            'reputations' => [], // reputation values
            'rolls' => [], // most commonly used rolls
            'skillGroups' => [], // skill groups with skills
            'stunts' => [], // one-of kind tricks
            'variables' => [], // often changing values, like counters
            'xp' => [], // experience
        ];
    }
}
