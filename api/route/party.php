<?php

/**
 * Display party
 */
$app->get('/party/', function (Silex\Application $app) {
    $uri = $app['config']['dataSource'] . '?id=party&key=' . $app['config']['key'];

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    if ($data === null) {
        throw new \Exception("Party data not found", 404);
    }

    $party = new \Mikron\HubFront\Domain\Entity\Party($data);

    return $app['twig']->render(
        'party.twig',
        [
            'title' => 'Party',
            'display' => $app['display'],
            'partyData' => $party->getData(),
        ]
    );
});
