<?php

/**
 * Display party
 * @todo Acquisition of party data from external source
 */
$app->get('/party/', function (Silex\Application $app) {
    $uri = $app['config.deploy']['dataSource'] . '?id=party&key=' . $app['config.deploy']['key'];

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    if ($data === null) {
        throw new \Exception("Party data not found", 404);
    }

    $party = new \Mikron\HubFront\Domain\Entity\Party($data);

    return $app['twig']->render(
        'party.twig',
        [
            'title' => 'Party roster',
            'display' => $app['display'],
            'partyData' => $party->getData(),
        ]
    );
});
