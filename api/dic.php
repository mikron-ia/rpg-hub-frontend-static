<?php

/**
 * Inter-application dependency injections
 */

/* Display data */
$app['display'] = [
    'interface' => $app['config']['interface'],
    'layout' => $app['config']['layout'],
];

/**
 * Registration of external tools
 */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../visuals/'.(empty($app['config']['system'])?'generic':$app['config']['system'])
));

/* URL management system */
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

/* Translation system registration */
$app->register(new Silex\Provider\TranslationServiceProvider(), ['locale_fallbacks' => ['en']]);

/* Translation system configuration */
$app['translator'] = $app->share($app->extend('translator', function ($translator) use ($app) {
    $translator->addLoader('yaml', new \Symfony\Component\Translation\Loader\YamlFileLoader());
    foreach ($app['config']['availableTranslations'] as $lang) {
        $translator->addResource('yaml', __DIR__ . '/../translation/' . $lang . '.yml', $lang);
    }
    return $translator;
}));

/* Set locale; for unknown reason, contrary to documentation, 'locale' in register() method fails to work */
$app['translator']->setLocale($app['config']['lang']);
