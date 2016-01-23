<?php

use Mikron\HubFront\Infrastructure\Security\Authentication;

/**
 * List of people
 */
$app->get('/people/', function (Silex\Application $app) {
    $authentication = new Authentication(
        $app['config']['authentication'],
        'hub',
        $app['config']['dataSource']['authStrategy']
    );

    $authMethod = $authentication->provideAuthenticationMethod();
    $authKey = $authentication->provideAuthenticationKey();

    if ($app['config']['dataSource']['queryUri']) {
        $uri = $app['config']['dataSource']['uri'] . '?object=people'
            . '&auth-method=' . $authMethod . '&key=' . $authKey;
    } else {
        $uri = $app['config']['dataSource']['uri'] . 'people/'
            . $authMethod . '/' . $authKey . '/';
    }

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    if ($data === null) {
        throw new \Exception("Character not found", 404);
    }

    $peopleData = [];

    foreach($data['content'] as $person) {
        $peopleData[] = new \Mikron\HubFront\Domain\Entity\Person($app['config']['dataPatterns'], $person);
    }

    $peopleArray = [];

    foreach($peopleData as $personData) {
        $peopleArray[] = $personData->getData();
    }

    return $app['twig']->render(
        'persons.twig',
        [
            'title' => 'People',
            'display' => $app['display'],
            'peopleData' => $peopleArray
        ]
    );
});
