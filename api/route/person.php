<?php

/**
 * List of people
 */
$app->get('/people/', function (Silex\Application $app) {
    return $app['twig']->render(
        'persons.twig',
        [
            'title' => 'People',
            'display' => $app['display'],
        ]
    );
});