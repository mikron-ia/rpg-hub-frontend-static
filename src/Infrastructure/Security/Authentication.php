<?php

namespace Mikron\HubFront\Infrastructure\Security;

use Mikron\HubFront\Domain\Blueprint\AuthenticationToken;
use Mikron\HubFront\Domain\Exception\AuthenticationException;

/**
 * Class AuthenticationFactory
 * @package Mikron\HubFront\Infrastructure\Security
 */
class Authentication
{
    /**
     * @var AuthenticationToken
     */
    private $token;

    /**
     * @param array $config Configuration segment responsible for authentication
     * @param string $direction Who is trying to talk to us and which keyset is used?
     * @param string $authenticationMethodUsed What method are they trying to use?
     * @throws AuthenticationException
     */
    public function __construct($config, $direction, $authenticationMethodUsed)
    {
        if (!isset($config['authenticationMethodReference'])) {
            throw new AuthenticationException(
                "Authentication configuration error",
                "Authentication configuration error: missing reference table for authentication methods"
            );
        }

        if (!isset($config['authenticationMethodReference'][$authenticationMethodUsed])) {
            throw new AuthenticationException(
                "Authentication configuration error",
                "Authentication configuration error: missing reference for '$authenticationMethodUsed' method"
            );
        }

        $authenticationMethod = $config['authenticationMethodReference'][$authenticationMethodUsed];

        if (!in_array($authenticationMethod, $config[$direction]['allowedStrategies'])) {
            throw new AuthenticationException(
                "Authentication strategy '$authenticationMethod' ('$authenticationMethodUsed') not allowed"
            );
        }

        $this->token = $this->createToken($config[$direction], $authenticationMethod);
    }

    /**
     * @param array $configWithChosenDirection
     * @param string $authenticationMethod
     * @return AuthenticationToken
     * @throws AuthenticationException
     */
    private function createToken($configWithChosenDirection, $authenticationMethod)
    {
        $className = 'Mikron\HubFront\Infrastructure\Security\AuthenticationToken' . ucfirst($authenticationMethod);

        if (!class_exists($className)) {
            throw new AuthenticationException(
                "Authentication configuration error",
                "Authentication configuration error: class $className, despite being allowed, does not exist"
            );
        }

        return new $className($configWithChosenDirection['settingsByStrategy']);
    }

    /**
     * @param string $authenticationKey What is the key they present?
     * @return bool
     */
    public function isAuthenticated($authenticationKey)
    {
        return $this->token->checksOut($authenticationKey);
    }

    /**
     * Provides authentication method for use in outgoing message
     * @return string
     */
    public function provideAuthenticationMethod()
    {
        return 'auth-' . $this->token->provideMethod();
    }

    /**
     * Provides authentication key for use in outgoing message
     * @return string
     */
    public function provideAuthenticationKey()
    {
        return $this->token->provideKey();
    }
}
