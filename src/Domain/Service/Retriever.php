<?php

namespace Mikron\HubFront\Domain\Service;

use Mikron\HubFront\Domain\Exception\InvalidDataException;
use Mikron\HubFront\Domain\Exception\InvalidSourceException;

/**
 * Class Retriever - retrieves data from a given source
 * @package Mikron\HubFront\Domain\Service
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
    private $json;

    /**
     * @var string Retrieved data in array
     */
    private $data;

    /**
     * Retriever constructor.
     * @param $uri
     * @throws \Exception
     */
    public function __construct($uri)
    {
        $this->uri = $uri;

        $json = $this->retrieve();
        $this->json = $json;

        $data = json_decode($json, true);
        if (empty($data)) {
            throw new InvalidDataException("Invalid JSON data, unable to decode");
        }
        $this->data = $data;
    }

    /**
     * @return string JSON from the source
     * @throws InvalidSourceException
     */
    private function retrieve()
    {
        $curl = curl_init($this->uri);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);

        $result = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if (!empty($error)) {
            throw new InvalidSourceException("cURL error: " . $error);
        }

        return $this->formatInput($result);
    }

    /**
     * @return string
     */
    public function getDataAsJSON()
    {
        return $this->json;
    }

    /**
     * @return array
     */
    public function getDataAsArray()
    {
        return $this->data;
    }

    /**
     * Formats JSON string - at the moment, replacing newlines with <br>s
     * NOTE: few fields in the system accept raw HTML. Use newlines with caution
     *
     * @param $input JSON string to format
     * @return string Formatted JSON string
     */
    private function formatInput($input)
    {
        return str_replace(["\\n", "\\r"], "<br>", str_replace("\\n\\r", "<br>", $input));
    }
}
