<?php

/**
 * Display story data
 */
$app->get('/campaign/', function (Silex\Application $app) {
    $uri = $app['config.deploy']['dataSource'] . '?id=campaign&key=' . $app['config.deploy']['key'];

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    if ($data === null) {
        throw new \Exception("Campaign data not found", 404);
    }

    $campaign = new \Mikron\HubFront\Domain\Entity\Campaign($data);

    return $app['twig']->render(
        'campaign.twig',
        [
            'title' => 'Campaign history',
            'display' => $app['display'],
            'campaignData' => $campaign->getData(),
        ]
    );
});
