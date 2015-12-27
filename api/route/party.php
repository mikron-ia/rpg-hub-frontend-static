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

    if ($app['config']['dataSource']['queryUri']) {
        $uri = $app['config']['dataSource']['uri'] . '?object=group'
            . '&access-method=' . $accessMethod . '&id=' . $accessId
            . '&auth-method=' . $authMethod . '&key=' . $authKey;
    } else {
        $uri = $app['config']['dataSource']['uri'] . 'group/'
            . $accessMethod . '/' . $accessId . '/'
            . $authMethod . '/' . $authKey . '/';
    }

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    if ($data === null) {
        throw new \Exception("Party data not found", 404);
    }

    $party = new \Mikron\HubFront\Domain\Entity\Party($data['content']);

    return $app['twig']->render(
        'party.twig',
        [
            'title' => 'Party',
            'display' => $app['display'],
            'partyData' => $party->getData(),
        ]
    );
});
