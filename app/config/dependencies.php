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

    // views of project
    $container[App\Action\Home::class] = function ($container) {
        return new App\Action\Home($container['view']);
    };
    $container[App\Action\About::class] = function ($container) {
        return new App\Action\About($container['view']);
    };
    $container[App\Action\Contact::class] = function ($container) {
        return new App\Action\Contact($container['view']);
    };

    // settings PHPMailer
    $container['email'] = function ($container) {
        $emailconfig = $container->get('settings')['sendEmail'];
        $mail = new \PHPMailer;

//        define secure
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->isHTML(true);
        $mail->SMTPSecure = 'tls';

//        settings email
        $mail->Host = $emailconfig['host'];
        $mail->Username = $emailconfig['username'];
        $mail->Password = $emailconfig['password'];
        $mail->Port = $emailconfig['port'];

        return $mail;
    };
    $container[App\Action\SendEmail::class] = function ($container) {
        return new App\Action\SendEmail($container['App\Utils\EmailPHPMailer'], $container['view']);
    };
    $container[App\Utils\EmailPHPMailer::class] = function ($container) {
        return new App\Utils\EmailPHPMailer($container['email']);
    };
