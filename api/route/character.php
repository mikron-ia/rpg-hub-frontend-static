<?php

/**
 * Directs to character list
 * @todo Redirect to character specific to user logged in
 */
$app->get('/character/', function (Silex\Application $app) {
    return $app['twig']->render(
        'characters.twig',
        [
            'title' => 'Character list',
            'display' => $app['display'],
            'list' => true,
        ]
    );
});

/**
 * Display character with given ID
 */
$app->get('/character/{id}/', function (Silex\Application $app, $id) {
    $uri = $app['config.deploy']['dataSource'] . '?id=' . $id . '&key=' . $app['config.deploy']['key'];

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    if ($data === null) {
        throw new \Exception("Character not found", 404);
    }

    $character = new \Mikron\HubFront\Domain\Entity\Character($data);

    return $app['twig']->render(
        'character.twig',
        [
            'title' => 'Character statistics',
            'display' => $app['display'],
            'list' => false,
            'characterData' => $character->getData()
        ]
    );
});

/**
 * Display current state data for character with given ID
 */
$app->get('/character/{id}/current/', function (Silex\Application $app, $id) {
    $uri = $app['config.deploy']['dataSource'] . '?id=' . $id . '&key=' . $app['config.deploy']['key'];

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    if ($data === null) {
        throw new \Exception("Character not found", 404);
    }

    $character = new \Mikron\HubFront\Domain\Entity\Character($data);

    return $app['twig']->render(
        'character_current.twig',
        [
            'title' => 'Character current data',
            'display' => $app['display'],
            'list' => false,
            'characterData' => $character->getData()
        ]
    );
});
