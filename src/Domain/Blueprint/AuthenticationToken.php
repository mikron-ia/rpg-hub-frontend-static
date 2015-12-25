<?php

namespace Mikron\HubFront\Domain\Blueprint;

use Mikron\HubFront\Domain\Exception\AuthenticationException;

/**
 * Interface AuthenticationToken
 * @package Mikron\HubFront\Domain\Blueprint
 */
interface AuthenticationToken
{
    /**
     * AuthenticationToken constructor - accepts key data
     * @param array $configAuthenticationSettingsForMethod Configuration data for simple authentication strategy
     * @throws AuthenticationException Thrown in case the key is invalid
     */
    public function __construct($configAuthenticationSettingsForMethod);

    /**
     * Verifies if the token is valid
     * @param string $key
     * @return boolean true is token checks out
     */
    public function checksOut($key);

    /**
     * Provides a key to be sent as authentication
     * @return string Provided key
     */
    public function provideKey();

    /**
     * Provides a method name to be used for authentication
     * @return string Provided method name without the 'auth-' prefix
     */
    public function provideMethod();
}
