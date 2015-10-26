<?php

$app->error(function (Exception $exception) use ($app) {
    return $app['twig']->render(
        'layout\error.twig',
        [
            'title' => 'Error',
            'display' => $app['display'],
            'message' => $exception->getMessage()
        ]
    );
});
