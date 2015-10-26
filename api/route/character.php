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
 * Display entire party roster
 */
$app->get('/party/', function (Silex\Application $app) {
    return $app['twig']->render(
        'characters.twig',
        [
            'title' => 'Party roster',
            'display' => $app['display'],
        ]
    );
});

/**
 * Display specific character
 */
$app->get('/character/{id}', function (Silex\Application $app, $id) {
    $uri = $app['config.deploy']['dataSource'] . '?id=' . $id . '&key=' . $app['config.deploy']['key'];

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    if ($data === null) {
        throw new \Exception("Character not found", 404);
    }

    return $app['twig']->render(
        'character.twig',
        [
            'title' => 'Character statistics',
            'display' => $app['display'],
            'list' => false,
            'characterData' => [
                'name' => isset($data['name']) ? $data['name'] : "name not given",
                'attributes' => isset($data['attributes']) ? $data['attributes'] : [],
                'advantages' => isset($data['advantages']) ? $data['advantages'] : [],
                'reputations' => isset($data['reputations']) ? $data['reputations'] : [],
                'contacts' => isset($data['contacts']) ? $data['contacts'] : [],
            ]
        ]
    );
});
