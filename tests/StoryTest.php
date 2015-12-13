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

        $party = new Story($data);
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
