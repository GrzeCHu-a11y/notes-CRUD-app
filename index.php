<?php

declare(strict_types=1);

namespace App;

use Throwable;

require_once("src/utils/debug.php");
require_once("src/Controller.php");
require_once("src/Request.php");
$dbConfig = require_once("config/config.php");

try {
    $controller = new Controller($dbConfig);
    $controller->run();
} catch (Throwable $e) {
    echo "<h1>Error</h1>";
    echo '<h2>' . $e->getMessage() . " ERROR CODE:  " . $e->getCode() . '</h2>';
}
