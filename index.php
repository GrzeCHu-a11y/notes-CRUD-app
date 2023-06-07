<?php

declare(strict_types=1);

namespace App;

use Throwable;

require_once("src/utils/debug.php");
require_once("src/utils/Controller.php");
$dbConfig = require_once("config/config.php");


$request = [
    'get' => $_GET,
    'post' => $_POST
];

try {
    $controller = new Controller($request, $dbConfig);
    $controller->run();
} catch (Throwable $e) {
    echo "<h1>Error</h1>";
    echo '<h2>' . $e->getMessage() . " ERROR CODE:  " . $e->getCode() . '</h2>';
}
