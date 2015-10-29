<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class Character - contains basic data regarding the character
 * @package Mikron\HubFront\Domain\Entity
 */
class Character
{
    protected $advantages;
    protected $attributes;
    protected $basics;
    protected $catches;
    protected $contacts;
    protected $damage;
    protected $defences;
    protected $descriptions;
    protected $equipment;
    protected $expenses;
    protected $income;
    protected $languages;
    protected $money;
    protected $name;
    protected $reputations;
    protected $rolls;
    protected $skillGroups;
    protected $spells;
    protected $xp;

    /**
     * Character constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $attributeNamesList = $this->getProperties();

        foreach($attributeNamesList as $attributeName) {
            $this->$attributeName = isset($data[$attributeName]) ? $data[$attributeName] : [];
        }
    }

    public function getData()
    {
        $attributeNamesList = $this->getProperties();

        $attributes = [];

        foreach($attributeNamesList as $attributeName) {
            $attributes[$attributeName] = $this->$attributeName;
        }

        return $attributes;
    }

    private function getProperties()
    {
        $reflector = new \ReflectionClass($this);
        $characterAttributes = $reflector->getProperties(\ReflectionProperty::IS_PROTECTED);

        $attributeNamesList = [];

        foreach ($characterAttributes as $characterAttribute) {
            $attributeNamesList[] = $characterAttribute->getName();
        }

        return $attributeNamesList;
    }
}
