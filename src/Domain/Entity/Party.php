<?php

namespace Mikron\HubFront\Domain\Entity;

class Party extends BagOfAttributes
{
    function createData()
    {
        return [
            'members' => [], // list of party members
            'reputation' => [], // listing of party reputation
            'membersReputations' => [], // list of party members' reputation
            'help' => [],
        ];
    }
}
