<?php

use Mikron\HubFront\Domain\Entity\Epic;

class EpicTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function dataIsProcessedCorrectly()
    {
        $json = '{"name":"Test Epic"}';
        $data = json_decode($json, true);
        $pattern = [
            'epic' => [
                'name' => "",
                'current' => [],
                'stories' => [],
                'help' => [],
            ]
        ];

        $party = new Epic($pattern, $data);
        $result = $party->getData();

        $expectation = [
            'name' => "Test Epic",
            'current' => [],
            'stories' => [],
            'help' => [],
        ];

        $this->assertEquals($expectation, $result);
    }
}
