<?php

$app->get('/', function (Silex\Application $app) {
    return $app['twig']->render(
        'index.twig',
        [
            'interface' => $app['config.main']['interface'],
            'layout' => $app['config.deploy']['layout'],
        ]
    );
});
