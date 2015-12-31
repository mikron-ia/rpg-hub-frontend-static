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

    if ($app['config']['dataSource']['queryUri']) {
        $uri = $app['config']['dataSource']['uri'] . '?object=epic'
            . '&auth-method=' . $authMethod . '&key=' . $authKey;
    } else {
        $uri = $app['config']['dataSource']['uri'] . 'epic/'
            . $authMethod . '/' . $authKey . '/';
    }

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();
    if ($data === null) {
        throw new \Exception("Epic data not found", 404);
    }

    $epic = new \Mikron\HubFront\Domain\Entity\Epic($data['content']);

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
    $uri = $app['config']['dataSource'] . '?id=' . $storyId . '&key=' . $app['config']['key'];
    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();
    if ($data === null) {
        throw new \Exception("Story data not found", 404);
    }

    $story = new \Mikron\HubFront\Domain\Entity\Story($data);

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
