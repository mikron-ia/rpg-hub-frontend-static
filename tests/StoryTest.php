<?php

use Mikron\HubFront\Domain\Entity\Story;

class StoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function dataIsProcessedCorrectly()
    {
        $json = '{"name":"Test Story"}';
        $data = json_decode($json, true);

        $pattern = [
            'story' => [
                'name' => "",
                "key" => "",
                "parameters" => [],
                "short" => "",
                "long" => "",
            ]
        ];

        $party = new Story($pattern, $data);
        $result = $party->getData();

        $expectation = [
            'name' => "Test Story",
            "key" => "",
            "parameters" => [],
            "short" => "",
            "long" => "",
        ];

        $this->assertEquals($expectation, $result);
    }
}
