<?php

namespace App\models;

use App\core\App;

class User extends Model
{

    public static $table = 'users';

    public $id;
    public $nome;
    public $usuario;
    public $senha;
    public $email;
    public $token;
    public $hierarquia;
    public $clienteId;
    
    public static function login()
    {
        $dados['usuario'] = $_POST['usuario'];
        $dados['senha'] = $_POST['senha'];

        $result = App::get('database')->selectWhere(static::$table, $dados);

        if(!empty($result)){ 

            $_SESSION['logado'] = 1;
            $_SESSION['id'] = $result[0]->id;
            $_SESSION['nome'] = $result[0]->nome;
            $_SESSION['usuario'] = $result[0]->usuario;
            $_SESSION['email'] = $result[0]->email;
            $_SESSION['hierarquia'] = $result[0]->hierarquia;

            $cliente['id'] = $result[0]->clienteId;

            $retorno = App::get('database')->selectWhere('clientes', $cliente);

            $_SESSION['sirius'] = $result[0]->sirius;
            $_SESSION['cnpj'] = $retorno[0]->cnpj;
            $_SESSION['cliente'] = $retorno[0]->nome;
            $_SESSION['clienteId'] = $retorno[0]->id;

        }

        return $result;
    }

    public static function logout()
    {
        $_SESSION['logado'] = 0;
        
        session_destroy();
    }

    public static function cadastrar($values)
    {
        App::get('database')->insert(static::$table, $values);
    }

    public static function buscar()
    {
        $result = App::get('database')->selectAll(static::$table);
        return $result;
    }

    public static function atualizar($dados)
    {
        App::get('database')->update(static::$table, $dados, $where = ["id", $dados['id']]);
    }

    public static function deletar($usuario)
    {
        App::get('database')->delete(static::$table, $where = ["id", $usuario]);
    }

    public static function encontrar($usuario)
    {
        $result = App::get('database')->selectWhere(static::$table, $usuario);

        return $result;
    }

}