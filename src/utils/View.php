<?php

declare(strict_types=1);

namespace App;

class View
{
    public function render($page, $notes): void
    {
        require_once("templates/layout.php");
    }
}
