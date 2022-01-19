<?php

namespace App\Controllers;

use App\models\Cliente;
use App\models\Email;
use App\models\User;

class EmailController extends Controller
{

    public function enviar()
    {
        $email = $_POST;

        $token = Email::gerarToken(8);
        $usuario = User::encontrar($email);

        $dados['token'] = $token;
        $dados['id'] = $usuario[0]->id;

        User::atualizar($dados);

        $conteudo['assunto'] = 'Recuperação de Email!';
        $conteudo['mensagem'] = 'Seu código de recuperação é : <b style="font-size:26px">'.$token.'</b>';

        Email::enviar('aznuclear@gmail.com', $email['email'], $conteudo);

        $resposta['token'] = $token;
        $resposta['userId'] = $usuario[0]->id;;

        return $this->responderJSON($resposta);
    }

}