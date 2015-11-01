<?php

namespace Mikron\HubFront\Domain\Service;

/**
 * Class Retriever - retrieves data from a given source
 * @package Mikron\HubFront\Domain\Service
 * @todo Exception handling
 */
class Retriever
{
    /**
     * @var string Data source
     */
    private $uri;

    /**
     * @var string Retrieved data in JSON
     */
    private $data;

    /**
     * Retriever constructor.
     * @param $uri
     */
    public function __construct($uri)
    {
        $this->uri = $uri;
        $this->data = $this->retrieve();
    }

    /**
     * @return string JSON from the source
     */
    private function retrieve()
    {
        $curl = curl_init($this->uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

    /**
     * @return string
     */
    public function getDataAsJSON()
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getDataAsArray()
    {
        return json_decode($this->getDataAsJSON(), true);
    }
}
