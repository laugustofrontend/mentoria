<?php
/**
 * Created by PhpStorm.
 * User: laugusto
 * Date: 6/16/17
 * Time: 2:31 PM
 */

namespace App\Action;

use PSR\Http\Message\ServerRequestInterface as Request;
use PSR\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig as View;

class Hello
{
    private $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $this->view->render($response, 'hello.twig', [
            'name' => $args['name']
        ]);
        return $response;
    }
}
