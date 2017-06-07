<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 6/4/17
 * Time: 3:27 PM
 */

    $container = $app->getContainer();

    $container['view'] = function ($container) {
        $viewConfig = $container -> get('settings')['view'];
        $view = new \Slim\Views\Twig($viewConfig['templates'], [
            'cache' => $viewConfig['cache'],
            'debub' => $viewConfig['debug']
        ]);

        $view -> addExtension(new \Slim\Views\TwigExtension(
            $container['router'],
            $container['request']->getUri()
        ));

        return $view;
    };

    $container[App\Action\Home::class] = function ($container)
    {
        return new App\Action\Home($container['view']);
    };
    $container[App\Action\About::class] = function ($container)
    {
        return new App\Action\About($container['view']);
    };
    $container[App\Action\Contact::class] = function ($container)
    {
        return new App\Action\Contact($container['view']);
    };