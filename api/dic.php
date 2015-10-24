<?php

/* Inter-application dependency injections */

/* Registration of external tools */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../visuals'
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app['display'] = [
    'interface' => array_merge(
        $app['config.main']['interface'],
        isset($app['config.system']['interface'])?$app['config.system']['interface']:[],
        isset($app['config.epic']['interface'])?$app['config.epic']['interface']:[],
        isset($app['config.deploy']['interface'])?$app['config.deploy']['interface']:[]
    ),
    'layout' => $app['config.deploy']['layout'],
];
