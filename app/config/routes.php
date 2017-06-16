<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 6/4/17
 * Time: 3:27 PM
 */

    $app->get('/', App\Action\Home::class);
    $app->get('/about', App\Action\About::class);
    $app->get('/contact', App\Action\Contact::class);
    $app->post('/sendemail', App\Action\SendEmail::class);
    $app->get('/hello/{name}', App\Action\Hello::class);
