<?php

declare(strict_types=1);

namespace App;

require_once("View.php");

class Controller
{
    const DEAFULT_PAGE = 'notesList';
    private View $view;
    public array $request;

    public function __construct(array $request)
    {
        $this->view = new View();
        $this->request = $request;
    }

    public function run(): void
    {
        $page = $this->requestGetData();
        $this->view->render($page);
    }

    private function requestGetData(): string
    {
        return $this->request['get']['action'] ?? self::DEAFULT_PAGE;
    }
}
