<?php

/* Inter-application dependency injections */

/* Registration of external tools */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../visuals'
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app['display'] = [
    'interface' => $app['config']['interface'],
    'layout' => $app['config']['layout'],
];
