<?php

use Mikron\HubFront\Domain\Entity\Campaign;

class CampaignTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function dataIsProcessedCorrectly()
    {
        $json = '{"name":"Test Epic"}';
        $data = json_decode($json, true);

        $party = new Campaign($data);
        $result = $party->getData();

        $expectation = [
            'name' => "Test Epic",
            'stories' => [],
            'help' => [],
        ];

        $this->assertEquals($expectation, $result);
    }
}
