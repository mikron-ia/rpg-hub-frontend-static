<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class Party
 * @package Mikron\HubFront\Domain\Entity
 * @todo Split it into correct and neat universal domain
 */
class Party extends BagOfAttributes
{
    function createData()
    {
        return [
            'members' => [], // list of party members
            'reputation' => [], // listing of party reputation
            'membersReputations' => [], // list of party members' reputation
            'help' => [], // helpful information to display on page
        ];
    }
}
