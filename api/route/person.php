<?php

use Mikron\HubFront\Infrastructure\Security\Authentication;

/**
 * List of all people known
 */
$app->get('/people/', function (Silex\Application $app) {
    $authentication = new Authentication(
        $app['config']['authentication'],
        'hub',
        $app['config']['dataSource']['authStrategy']
    );

    $authMethod = $authentication->provideAuthenticationMethod();
    $authKey = $authentication->provideAuthenticationKey();

    $tokens = ['{object}', '{authMethod}', '{authKey}'];
    $values = ['people', $authMethod, $authKey];

    $uri = str_replace($tokens, $values, $app['config']['dataSource']['uriForIndex']);

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    $peopleData = [];

    foreach ($data['content'] as $person) {
        $peopleData[] = new \Mikron\HubFront\Domain\Entity\Person($app['config']['dataPatterns'], $person);
    }

    $peopleArray = [];

    foreach ($peopleData as $personData) {
        $peopleArray[] = $personData->getData();
    }

    return $app['twig']->render(
        'persons.twig',
        [
            'title' => 'People',
            'display' => $app['display'],
            'peopleData' => array_reverse($peopleArray)
        ]
    );
});

/**
 * List of all people with a tag
 */
$app->get('/people/tag/{id}/', function (Silex\Application $app, $id) {
    $authentication = new Authentication(
        $app['config']['authentication'],
        'hub',
        $app['config']['dataSource']['authStrategy']
    );

    $accessMethod = 'tag';
    $accessId = $id;
    $authMethod = $authentication->provideAuthenticationMethod();
    $authKey = $authentication->provideAuthenticationKey();

    $tokens = ['{object}', '{accessMethod}', '{accessId}', '{authMethod}', '{authKey}'];
    $values = ['person', $accessMethod, $accessId, $authMethod, $authKey];

    $uri = str_replace($tokens, $values, $app['config']['dataSource']['uriForView']);

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    $peopleData = [];

    foreach ($data['content'] as $person) {
        $peopleData[] = new \Mikron\HubFront\Domain\Entity\Person($app['config']['dataPatterns'], $person);
    }

    $peopleArray = [];

    foreach ($peopleData as $personData) {
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

/**
 * List complete data of a particular person
 */
$app->get('/person/{id}/', function (Silex\Application $app, $id) {
    $authentication = new Authentication(
        $app['config']['authentication'],
        'hub',
        $app['config']['dataSource']['authStrategy']
    );

    $accessMethod = 'key';
    $accessId = $id;
    $authMethod = $authentication->provideAuthenticationMethod();
    $authKey = $authentication->provideAuthenticationKey();

    $tokens = ['{object}', '{accessMethod}', '{accessId}', '{authMethod}', '{authKey}'];
    $values = ['person', $accessMethod, $accessId, $authMethod, $authKey];

    $uri = str_replace($tokens, $values, $app['config']['dataSource']['uriForView']);

    $retriever = new \Mikron\HubFront\Domain\Service\Retriever($uri);

    $data = $retriever->getDataAsArray();

    $person = new \Mikron\HubFront\Domain\Entity\Person($app['config']['dataPatterns'], $data['content']);

    return $app['twig']->render(
        'person.twig',
        [
            'title' => 'People',
            'display' => $app['display'],
            'personData' => $person->getData(),
            'personKey' => $id
        ]
    );
});