<?php

namespace Mikron\HubFront\Domain\Entity;

/**
 * Class BagOfAttributes - base class for all bag-like resources that are extras for model
 * 
 * @package Mikron\HubFront\Domain\Entity
 */
abstract class BagOfAttributes
{
    /**
     * @var array Data for the object
     */
    protected $data;

    /**
     * @var array Pattern to be used
     */
    private $dataPattern;

    /**
     * Character constructor.
     * @param array $dataPattern
     * @param array $inputData
     */
    public function __construct($dataPattern, $inputData)
    {
        $this->dataPattern = $dataPattern[$this->choosePattern()];

        $this->data = $this->dataPattern;

        $attributeNamesList = $this->getProperties();

        foreach ($attributeNamesList as $attributeName) {
            if (isset($inputData[$attributeName])) {
                $this->data[$attributeName] = $inputData[$attributeName];
            }
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        $attributeNamesList = $this->getProperties();

        $attributes = [];

        foreach ($attributeNamesList as $attributeName) {
            $attributes[$attributeName] = $this->data[$attributeName];
        }

        return $attributes;
    }

    /**
     * @return string[]
     */
    private function getProperties()
    {
        return array_keys($this->data);
    }

    /**
     * @return string Pattern key
     */
    abstract function choosePattern();
}