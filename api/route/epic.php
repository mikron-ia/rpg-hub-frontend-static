<?php

use Mikron\HubFront\Infrastructure\Security\Authentication;

/**
 * Display epic data
 */
$app->get('/epic/', function (Silex\Application $app) {
    $authentication = new Authentication(
        $app['config']['authentication'],
        'hub',
        $app['config']['dataSource']['authStrategy']
    );

    $authMethod = $authentication->provideAuthenticationMethod();
    $authKey = $authentication->provideAuthenticationKey();

    $tokens = ['{object}', '{authMethod}', '{authKey}'];
    $values = ['epic', $authMethod, $authKey];

    $uri = str_replace($tokens, $values, $app['config']['dataSource']['uriForIndex']);

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();
    if ($data === null) {
        throw new \Exception("Epic data not found", 404);
    }

    $epic = new \Mikron\HubFront\Domain\Entity\Epic($app['config']['dataPatterns'], $data['content']);

    return $app['twig']->render(
        'epic.twig',
        [
            'title' => 'Epic history',
            'display' => $app['display'],
            'epicData' => $epic->getData(),
        ]
    );
})->bind('epicMain');

/**
 * Display specific story data
 */
$app->get('/epic/story/{storyId}/', function (Silex\Application $app, $storyId) {
    $authentication = new Authentication(
        $app['config']['authentication'],
        'hub',
        $app['config']['dataSource']['authStrategy']
    );

    $accessMethod = 'key';
    $accessId = $storyId;
    $authMethod = $authentication->provideAuthenticationMethod();
    $authKey = $authentication->provideAuthenticationKey();

    $tokens = ['{object}', '{accessMethod}', '{accessId}', '{authMethod}', '{authKey}'];
    $values = ['story', $accessMethod, $accessId, $authMethod, $authKey];

    $uri = str_replace($tokens, $values, $app['config']['dataSource']['uriForView']);

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();
    if ($data === null) {
        throw new \Exception("Story data not found", 404);
    }

    $story = new \Mikron\HubFront\Domain\Entity\Story($app['config']['dataPatterns'], $data['content']);

    return $app['twig']->render(
        'story.twig',
        [
            'title' => 'Story data',
            'display' => $app['display'],
            'storyData' => $story->getData(),
        ]
    );
});

/* Legacy redirect */
$app->get('/campaign/', function () use ($app) {
    return $app->redirect($app["url_generator"]->generate("epicMain"), 307);
});
