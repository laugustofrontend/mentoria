<?php
/**
 * Created by PhpStorm.
 * User: laugusto
 * Date: 5/20/17
 * Time: 10:32 PM
 */
namespace App;

    require __DIR__ . '/../vendor/autoload.php';

    $config = require __DIR__ . '/../app/config/config.php';


    $app = new \Slim\App($config);



    require __DIR__ . '/../app/config/dependencies.php';
    require __DIR__ . '/../app/config/routes.php';

    $app->run();
