<?php

use Mikron\HubFront\Infrastructure\Security\Authentication;

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
    $authentication = new Authentication(
        $app['config']['authentication'],
        'hub',
        $app['config']['dataSource']['authStrategy']
    );

    $accessMethod = 'key';
    $accessId = $id;
    $authMethod = $authentication->provideAuthenticationMethod();
    $authKey = $authentication->provideAuthenticationKey();

    if ($app['config']['dataSource']['queryUri']) {
        $uri = $app['config']['dataSource']['uri'] . '?object=character'
            . '&access-method=' . $accessMethod . '&id=' . $accessId
            . '&auth-method=' . $authMethod . '&key=' . $authKey;
    } else {
        $uri = $app['config']['dataSource']['uri'] . 'character/'
            . $accessMethod . '/' . $accessId . '/'
            . $authMethod . '/' . $authKey . '/';
    }

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    if ($data === null) {
        throw new \Exception("Character not found", 404);
    }

    $character = new \Mikron\HubFront\Domain\Entity\Character($app['config']['dataPatterns'], $data['content']);

    return $app['twig']->render(
        'character.twig',
        [
            'title' => 'Character statistics',
            'display' => $app['display'],
            'characterKey' => $id,
            'list' => false,
            'characterData' => $character->getData()
        ]
    );
});

/**
 * Display printable sheet for character with given ID
 */
$app->get('/character/{id}/print/', function (Silex\Application $app, $id) {
    $authentication = new Authentication(
        $app['config']['authentication'],
        'hub',
        $app['config']['dataSource']['authStrategy']
    );

    $accessMethod = 'key';
    $accessId = $id;
    $authMethod = $authentication->provideAuthenticationMethod();
    $authKey = $authentication->provideAuthenticationKey();

    if ($app['config']['dataSource']['queryUri']) {
        $uri = $app['config']['dataSource']['uri'] . '?object=character'
            . '&access-method=' . $accessMethod . '&id=' . $accessId
            . '&auth-method=' . $authMethod . '&key=' . $authKey;
    } else {
        $uri = $app['config']['dataSource']['uri'] . 'character/'
            . $accessMethod . '/' . $accessId . '/'
            . $authMethod . '/' . $authKey . '/';
    }

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    if ($data === null) {
        throw new \Exception("Character not found", 404);
    }

    $character = new \Mikron\HubFront\Domain\Entity\Character($app['config']['dataPatterns'], $data['content']);

    return $app['twig']->render(
        'character_print.twig',
        [
            'title' => 'Character printable sheet',
            'display' => $app['display'],
            'list' => false,
            'characterData' => $character->getData()
        ]
    );
});

/**
 * Display history for character with given ID
 */
$app->get('/character/{id}/history/', function (Silex\Application $app, $id) {
    $authentication = new Authentication(
        $app['config']['authentication'],
        'hub',
        $app['config']['dataSource']['authStrategy']
    );

    $accessMethod = 'key';
    $accessId = $id;
    $authMethod = $authentication->provideAuthenticationMethod();
    $authKey = $authentication->provideAuthenticationKey();

    if ($app['config']['dataSource']['queryUri']) {
        $uri = $app['config']['dataSource']['uri'] . '?object=character'
            . '&access-method=' . $accessMethod . '&id=' . $accessId
            . '&auth-method=' . $authMethod . '&key=' . $authKey;
    } else {
        $uri = $app['config']['dataSource']['uri'] . 'character/'
            . $accessMethod . '/' . $accessId . '/'
            . $authMethod . '/' . $authKey . '/';
    }

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    if ($data === null) {
        throw new \Exception("Character not found", 404);
    }

    $character = new \Mikron\HubFront\Domain\Entity\Character($app['config']['dataPatterns'], $data['content']);

    return $app['twig']->render(
        'character_history.twig',
        [
            'title' => 'Character history',
            'display' => $app['display'],
            'characterKey' => $id,
            'list' => false,
            'characterData' => $character->getData()
        ]
    );
});
