<?php

declare(strict_types=1);

namespace App;

require_once("View.php");

class Controller
{
    const DEFAULT_PAGE = 'notesList';
    private View $view;
    public array $request;

    public function __construct(array $request)
    {
        $this->view = new View();
        $this->request = $request;
    }

    public function run(): void
    {
        switch ($this->requestGetData()) {
            case 'createNote':
                $page = 'createNote';
                break;

            default:
                $page = self::DEFAULT_PAGE;
                break;
        }

        $this->view->render($page);
    }

    private function requestGetData(): string
    {
        return $this->request['get']['action'] ?? self::DEFAULT_PAGE;
    }

    private function requestPostData(): array
    {
        return [];
    }
}
