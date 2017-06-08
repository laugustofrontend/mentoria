<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 6/4/17
 * Time: 3:34 PM
 */
namespace App\Action;

use PSR\Http\Message\ServerRequestInterface as Request;
use PSR\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig as View;

final class Home
{
    private $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $this->view->render($response, 'home.html');
        return $response;
    }
}