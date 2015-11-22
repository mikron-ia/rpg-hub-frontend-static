<?php

/* Inter-application dependency injections */

/* Registration of external tools */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../visuals'
));

/* URL management system */
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

/* Dispay data */
$app['display'] = [
    'interface' => $app['config']['interface'],
    'layout' => $app['config']['layout'],
];

/* Translation system */
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'lang' => $app['config']['lang'],
    'locale_fallbacks' => ['en'],
));

$app['translator'] = $app->share($app->extend('translator', function ($translator) use ($app) {
    $translator->addLoader('yaml', new \Symfony\Component\Translation\Loader\YamlFileLoader());
    foreach ($app['config']['availableTranslations'] as $lang) {
        $translator->addResource('yaml', __DIR__ . '/../translation/' . $lang . '.yml', $lang);
    }
    return $translator;
}));
