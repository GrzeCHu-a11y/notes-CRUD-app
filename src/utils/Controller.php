<?php

declare(strict_types=1);

namespace App;

require_once("View.php");

class Controller
{

    public View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function run(): void
    {
        $this->view->render();
    }
}
