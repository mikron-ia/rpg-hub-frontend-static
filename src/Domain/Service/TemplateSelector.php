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
     * @param string $system System code
     * @param string $filename Name of the file to be located
     * @return string
     * @throws MissingComponentException
     */
    public static function getPathForTwigFile($system, $filename)
    {
        $primaryChoiceFilename = $system . '/';
        $secondaryChoiceFilename = 'generic/';

        $primaryChoiceExists = file_exists('../visuals/' . $primaryChoiceFilename . $filename);
        $secondaryChoiceExists = file_exists('../visuals/' . $secondaryChoiceFilename . $filename);

        if ($primaryChoiceExists) {
            return $primaryChoiceFilename;
        }

        if ($secondaryChoiceExists) {
            return $secondaryChoiceFilename;
        }

        throw new MissingComponentException(
            'Missing template. Please excuse the inconvenience',
            'Missing template ' . $filename . ' for system ' . $system . '. Unable to use generic.'
        );
    }
}
