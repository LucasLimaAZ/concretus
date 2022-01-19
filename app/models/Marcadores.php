<?php

namespace App\models;

use App\core\App;

class Marcadores extends Model
{

    public static $table = 'marcadores';

    public static function buscar()
    {
        $resultado = App::get('database')->selectAll(static::$table);

        return $resultado;
    }

    public static function encontrar($dados)
    {
        $resultado = App::get('database')->selectWhere(static::$table, $dados);

        return $resultado;
    }

    public static function cadastrar($dados)
    {
        return App::get('database')->insert(static::$table, $dados);
    }

    public static function deletar($marcador)
    {
        return App::get('database')->delete(static::$table, $where = ["id", $marcador['id']]);
    }

}