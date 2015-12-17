<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class Party
 * @package Mikron\HubFront\Domain\Entity
 */
class Party extends BagOfAttributes
{
    function createData()
    {
        return [
            'members' => [], // list of party members
            'reputation' => [], // listing of party reputation
            'reputationEvents' => [], // listing of party reputation history
            'membersReputations' => [], // list of party members' reputation
            'pastMembers' => [], // retired or dead members
            'absentMembers' => [], // suspended or currently absent members
            'help' => [], // helpful information to display on page
        ];
    }
}
