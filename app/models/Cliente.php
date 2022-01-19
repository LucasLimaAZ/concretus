<?php

namespace App\models;

use App\Core\App;
use App\models\Model;

class Cliente extends Model
{
    public static $table = 'clientes';

    public $id;
    public $nome;
    public $cnpj;
    public $sirius;
    public $responsavel;
    public $site;
    public $email;

    public static function cadastrar($values)
    {
        App::get('database')->insert(static::$table, $values);
    }

    public static function encontrar($where)
    {
        $result = App::get('database')->selectWhere(static::$table, $where);
        return $result;
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

    public static function deletar($cliente)
    {
        App::get('database')->delete(static::$table, $where = ["id", $cliente]);
    }

}