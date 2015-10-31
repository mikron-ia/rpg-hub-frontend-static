<?php

/**
 * Display party
 * @todo Acquisition of party data from external source
 */
$app->get('/party/', function (Silex\Application $app) {
    return $app['twig']->render(
        'party.twig',
        [
            'title' => 'Party roster',
            'display' => $app['display'],
            'partyData' => [],
        ]
    );
});
