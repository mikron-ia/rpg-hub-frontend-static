<?php

/**
 * Display party
 */
$app->get('/party/{id}/', function (Silex\Application $app, $id) {
    $uri = $app['config']['dataSource']['uri']
        . 'group/key/' . $id
        . '/auth-' . $app['config']['dataSource']['authStrategy'] . '/' . $app['config']['dataSource']['authKey']
        . '/';

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
            'partyKey' => $id,
            'partyData' => $party->getData(),
        ]
    );
});
