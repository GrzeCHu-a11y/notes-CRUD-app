<?php

declare(strict_types=1);

namespace App;

require_once("src/utils/debug.php");
require_once("src/utils/Controller.php");

$request = [
    'get' => $_GET,
    'post' => $_POST
];

dump($_POST);
dump($_GET);
$controller = new Controller($request);
$controller->run();
