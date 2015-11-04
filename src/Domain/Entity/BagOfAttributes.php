<?php

namespace Mikron\HubFront\Domain\Entity;

abstract class BagOfAttributes
{
    protected $data;

    /**
     * Character constructor.
     * @param $inputData
     */
    public function __construct($inputData)
    {
        $this->data = $this->createData();

        $attributeNamesList = $this->getProperties();

        foreach ($attributeNamesList as $attributeName) {
            if (isset($inputData[$attributeName])) {
                $this->data[$attributeName] = $inputData[$attributeName];
            }
        }
    }

    public function getData()
    {
        $attributeNamesList = $this->getProperties();

        $attributes = [];

        foreach ($attributeNamesList as $attributeName) {
            $attributes[$attributeName] = $this->data[$attributeName];
        }

        return $attributes;
    }

    private function getProperties()
    {
        return array_keys($this->data);
    }

    /**
     * @return array Attribute labels with their default values
     */
    abstract function createData();
}