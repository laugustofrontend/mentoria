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

    // route view project
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

    // settings phpmailer
    $container['email'] = function ($container)
    {
        $emailconfig = $container->get('settings')['email'];
        $mail = new \phpmailer;

        $mail->issmtp();
        $mail->smtpauth = true;
        $mail->smtpsecure = 'tls';

        $mail->host = $emailconfig['host'];
        $mail->username = $emailconfig['username'];
        $mail->password = $emailconfig['password'];
        $mail->port = $emailconfig['port'];
        
        $mail->ishtml(true);

        return $mail;
    }