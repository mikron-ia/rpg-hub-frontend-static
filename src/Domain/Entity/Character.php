<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class Character - contains basic data regarding the character
 * @package Mikron\HubFront\Domain\Entity
 * @todo Split it into correct and neat universal domain
 */
class Character
{
    protected $advantages; // traits - advantages & disadvantages
    protected $attributes; // basic attributes
    protected $basics; // names, descriptions, etc.
    protected $catches; // catches: backgrounds, motivations...
    protected $contacts; // friends & allies
    protected $damage; // more permanent damage
    protected $defences; // hit difficulties
    protected $descriptions; // descriptions detailed
    protected $development; // development history
    protected $equipment; // items on person
    protected $expenses; // regular expenses
    protected $income; // regular income
    protected $languages; // languages known
    protected $money; // cash at hand
    protected $name; // used name
    protected $reputations; // reputation values
    protected $rolls; // most commonly used rolls
    protected $skillGroups; // skill groups with skills
    protected $stunts; // one-of kind tricks
    protected $variables; // often changing values, like counters
    protected $xp; // experience

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
