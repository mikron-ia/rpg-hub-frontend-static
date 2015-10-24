<?php

$app->get('/', function (Silex\Application $app) {
    return $app['twig']->render(
        'index.twig',
        [
            'title' => 'Main hall',
            'display' => $app['display'],
        ]
    );
});
