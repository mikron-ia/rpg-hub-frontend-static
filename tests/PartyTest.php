<?php

use Mikron\HubFront\Domain\Entity\Party;

class PartyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function dataIsProcessedCorrectly()
    {
        $json = '{"members":[{"name":"Tress"}, {"name":"James"}],"reputation":[],"membersReputations":[]}';
        $data = json_decode($json, true);
        $pattern = [
            'group' => [
                'members' => [],
                'reputations' => [],
                'reputationEvents' => [],
                'membersReputations' => [],
                'pastMembers' => [],
                'absentMembers' => [],
                'help' => [],
            ]
        ];

        $party = new Party($pattern, $data);
        $result = $party->getData();

        $expectation = [
            'members' => [
                ['name' => "Tress",],
                ['name' => "James",]
            ],
            'reputations' => [],
            'reputationEvents' => [],
            'membersReputations' => [],
            'pastMembers' => [],
            'absentMembers' => [],
            'help' => [],
        ];

        $this->assertEquals($expectation, $result);
    }
}
