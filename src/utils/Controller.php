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
                $postData = $this->requestPostData();

                if (!empty($postData)) {
                    $noteData = [
                        'title' => $postData['title'],
                        'description' => $postData['description']
                    ];
                    // FEATURE IN TESTING

                    // $page = self::DEFAULT_PAGE;
                    // header('Location: /');

                    // FEATURE IN TESTING

                } else $noteData = [];

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
        return $this->request['post'];
    }
}
