<?php

declare(strict_types=1);

namespace App;

require_once("View.php");
require_once("Database.php");
require_once("Request.php");

class Controller
{
    const DEFAULT_PAGE = 'notesList';
    private View $view;
    private array $dbConfig = [];
    private Database $database;
    private $request;

    public function __construct(array $dbConfig)
    {
        $this->view = new View();
        $this->request = new Request();
        $this->dbConfig = $dbConfig;
        $this->database = new Database($dbConfig);
    }

    public function notesList(): void
    {
        $page = self::DEFAULT_PAGE;
        $notes = $this->database->getNotes();
        $this->view->render($page, $notes);
    }

    public function createNote(): void
    {
        $page = 'createNote';
        if (!empty($this->request->post)) {
            $noteData = [
                'title' => $this->request->postParams('title'),
                'description' => $this->request->postParams('description'),
            ];
            $this->database->createNote($noteData);
            $page = self::DEFAULT_PAGE;
            header('Location: /');
        } else $noteData = [];
        $this->view->render($page, [], $noteData);
    }

    public function showNoteDescription(): void
    {
        $page = 'showNoteDescription';
        $noteId = (int) $this->request->getParams('id');
        $this->database->noteId = $noteId;
        $noteDescription = $this->database->getNoteDescription();
        $this->view->render($page, [], $noteDescription);
    }

    public function editNote(): void
    {
        $page = 'editNote';
        $this->database->updateNote();
        $this->view->render($page, []);
    }

    public function deleteNote(): void
    {
        $page = 'deleteNote';
        $this->database->deleteNote();
        $this->view->render($page, []);
    }

    public function run(): void
    {
        switch ($this->action()) {

            case 'createNote':
                $this->createNote();
                break;
            case 'notesList':
                $this->notesList();
                break;
            case 'showNoteDescription':
                $this->showNoteDescription();
                break;
            case 'editNote':
                $this->editNote();
                break;
            case 'deleteNote':
                $this->deleteNote();
                break;
        }
    }

    private function action()
    {
        $action = $this->request->getParams('action');
        return $action ?? self::DEFAULT_PAGE;
    }
}
