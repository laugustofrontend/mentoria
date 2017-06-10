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

        $template = $this->view->fetch('sendEmail/template.twig', [
            'name' => $dados['name'],
            'email' => $dados['email'],
            'subject' => $dados['subject'],
            'message' => $dados['message']
        ]);

        try {
            $this->email->addBody($template);

            $this->email->addSubject($dados['subject']);
            $this->email->addAddress('lucas.augusto5061@gmail.com', 'Lucas Augusto');
            $this->email->addFromEmail($dados['email'], $dados['name']);
            $this->email->send();
            $this->view->render($response, 'sendEmail/sucesso.twig', [
                'name' => $dados['name']
            ]);
        } catch (\Exception $exp) {
            $this->view->render($response, 'sendEmail/error.twig', [
                'error' => $exp->getMessage()
            ]);
        }
    }
}