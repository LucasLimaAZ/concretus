<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';

session_start();

use App\Core\{Router, Request};

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());
