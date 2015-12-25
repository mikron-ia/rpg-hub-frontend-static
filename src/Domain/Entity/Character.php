<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class Character - contains basic data regarding the character
 * @package Mikron\HubFront\Domain\Entity
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
            'descriptions' => [], // descriptions detailed
            'development' => [], // development history
            'equipment' => [], // items on person
            'expenses' => [], // regular expenses
            'help' => [], // helpful information to display on page
            'income' => [], // regular income
            'languages' => [], // languages known
            'money' => [], // cash at hand
            'name' => "", // used name
            'person' => [], //person data
            'public' => [], // public information
            'professions' => [], // used together skill groups with skills
            'rolls' => [], // most commonly used rolls
            'skillGroups' => [], // thematic skill groups
            'skills' => [], // skills
            'stunts' => [], // one-of kind tricks
            'weapons' => [], // specific catergory of equipment - tools for combat
            'variables' => [], // often changing values, like counters
            'xp' => [], // experience
        ];
    }
}
