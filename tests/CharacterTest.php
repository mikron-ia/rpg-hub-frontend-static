<?php

use Mikron\HubFront\Domain\Entity\Character;

class CharacterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function dataIsProcessedCorrectly()
    {
        $json = '{"name":"Tress","attributes":[],"advantages":[],"skillGroups":[]}';
        $data = json_decode($json, true);

        $character = new Character($data);
        $result = $character->getData();

        $expectation = [
            'advantages' => [],
            'attributes' => [],
            'basics' => [],
            'catches' => [],
            'contacts' => [],
            'damage' => [],
            'defences' => [],
            'description' => "",
            'descriptions' => [],
            'development' => [],
            'equipment' => [],
            'expenses' => [],
            'income' => [],
            'languages' => [],
            'money' => [],
            'public' => [],
            'name' => "Tress",
            'reputations' => [],
            'rolls' => [],
            'skillGroups' => [],
            'stunts' => [],
            'variables' => [],
            'xp' => [],
        ];

        $this->assertEquals($expectation, $result);
    }
}
