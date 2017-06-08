<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 08/06/17
 * Time: 13:36
 */

namespace App\Action;

use App\Interfaces\Email;
use Slim\Views\Twig as View;
use PSR\Http\Message\ServerRequestInterface as Request;
use PSR\Http\Message\ResponseInterface as Response;

class SendEmail
{
    private $email;
    private $view;

    public function __construct (Email $email, View $view)
    {
        $this->email = $email;
        $this->view = $view;
    }

    public function __invoke (Request $request, Response $response, $args)
    {
        $dados = $request->getParsedBody();

        try {
            $this->email->addBody('<p>'. $dados['name'] .'</p>');
            $this->email->addBody('<p>'. $dados['email'] .'</p>');
            $this->email->addBody('<p>'. $dados['message'] .'</p>');

            $this->email->addSubject('Novo Contato');
            $this->email->addAddress('lucas.augusto5061@gmail.com');
            $this->email->send();
            $this->view->render($response, 'sendEmail/sucesso.html', [
                'name' => $dados['name']
            ]);
        } catch (\Exception $exp) {
            $this->view->render($response, 'sendEmail/error.html', [
                'error' => $exp->getMessage()
            ]);
        }
    }
}