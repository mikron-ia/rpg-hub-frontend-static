<?php

use Mikron\HubFront\Infrastructure\Security\Authentication;

/**
 * Display party
 */
$app->get('/party/', function (Silex\Application $app) {
    $authentication = new Authentication(
        $app['config']['authentication'],
        'hub',
        $app['config']['dataSource']['authStrategy']
    );

    $accessMethod = 'key';
    $accessId = $app['config']['party']['groupKey'];
    $authMethod = $authentication->provideAuthenticationMethod();
    $authKey = $authentication->provideAuthenticationKey();

    $tokens = ['{object}', '{accessMethod}', '{accessId}', '{authMethod}', '{authKey}'];
    $values = ['group', $accessMethod, $accessId, $authMethod, $authKey];

    $uri = str_replace($tokens, $values, $app['config']['dataSource']['uriForView']);

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    if ($data === null) {
        throw new \Exception("Party data not found", 404);
    }

    $party = new \Mikron\HubFront\Domain\Entity\Party($app['config']['dataPatterns'], $data['content']);

    return $app['twig']->render(
        'party.twig',
        [
            'title' => 'Party',
            'display' => $app['display'],
            'partyData' => $party->getData(),
        ]
    );
});
