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
    return $app['twig']->render(
        'character.twig',
        [
            'title' => 'Character statistics',
            'display' => $app['display'],
        ]
    );
});
