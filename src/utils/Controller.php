<?php

declare(strict_types=1);

namespace App;

require_once("View.php");
require_once("Database.php");

class Controller
{
    const DEFAULT_PAGE = 'notesList';
    private View $view;
    private array $request;
    private array $dbConfig = [];
    private Database $database;

    public function __construct(array $request, $dbConfig)
    {
        $this->view = new View();
        $this->request = $request;
        $this->dbConfig = $dbConfig;
        $this->database = new Database($dbConfig);
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
                    $this->database->createNote($noteData);
                    $page = self::DEFAULT_PAGE;
                    header('Location: /');
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
