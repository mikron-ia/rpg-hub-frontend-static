<?php

namespace Mikron\HubFront\Domain\Service;

use Mikron\HubFront\Domain\Exception\MissingComponentException;

/**
 * Class TemplateSelector
 * @package Mikron\HubFront\Domain\Service
 */
class TemplateSelector
{
    /**
     * @var
     */
    private $system;

    /**
     * TemplateSelector constructor
     * @param $system
     */
    public function __construct($system)
    {
        $this->system = $system;
    }

    public function getPathForTwigFile($filename)
    {
        $primaryChoiceFilename = $this->system . '/' . $filename;
        $secondaryChoiceFilename = 'general/' . $filename;

        $primaryChoiceExists = file_exists($primaryChoiceFilename);
        $secondaryChoiceExists = file_exists($secondaryChoiceFilename);

        if ($primaryChoiceExists) {
            return $primaryChoiceFilename;
        }

        if ($secondaryChoiceExists) {
            return $secondaryChoiceFilename;
        }

        throw new MissingComponentException(
            'Missing template. Please excuse the inconvenience',
            'Missing template ' . $filename . ' for system ' . $this->system . '. Unable to use generic.'
        );
    }
}
