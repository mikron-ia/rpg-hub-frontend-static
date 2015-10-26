<?php

namespace Mikron\HubFront\Domain\Service;

class Retriever
{
    private $uri;
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

    private function retrieve()
    {
        $curl = curl_init($this->uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

    /**
     * @return mixed
     */
    public function getDataAsJSON()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getDataAsArray()
    {
        return json_decode($this->getDataAsJSON(), true);
    }
}
