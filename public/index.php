<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../core/Router.php';
$router = require __DIR__ . '/../routes/web.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->direct($uri, $method);