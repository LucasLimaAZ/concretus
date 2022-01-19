<?php

namespace App\models;

use App\core\App;

class Model
{
    
    public static function numero($table)
    {
        $result = App::get('database')->selectAll($table);

        $numero = 0;

        foreach($result as $cliente){$numero++;}

        return $numero;
    }

}