<?php

declare(strict_types=1);

namespace App;

use PDO;

class Database
{
    private PDO $dbConnection;
    public int $noteId;

    public function __construct($dbConfig)
    {
        $this->createConnection($dbConfig);
    }

    private function createConnection($dbConfig)
    {
        try {
            $dsn = "mysql:dbname={$dbConfig['db']['database']};host={$dbConfig['db']['host']}";
            $this->dbConnection = $dbConnection = new PDO(
                $dsn,
                $dbConfig['db']['user'],
                $dbConfig['db']['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
            // echo "Connection Succesful";
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function createNote(array $noteData): void
    {
        try {
            $title = $this->dbConnection->quote($noteData['title']);
            $description = $this->dbConnection->quote($noteData['description']);
            $created = $this->dbConnection->quote(date('Y-m-d H:i:s'));

            $query = "INSERT INTO crud_notes(title, description, created) VALUES($title, $description, $created)";
            $this->dbConnection->exec($query);
        } catch (\Throwable $th) {
            throw $th;
            echo "sorry note not added";
        }
    }

    public function getNotes(): array
    {
        try {
            $query = "SELECT * FROM crud_notes";
            $result = $this->dbConnection->query($query);
            $notes = $result->fetchAll(PDO::FETCH_ASSOC);
            return $notes;
        } catch (\Throwable $th) {
            throw $th;
            echo "notes not found";
        }
    }

    public function getNoteDescription(): string
    {
        $query = "SELECT description FROM crud_notes WHERE id = $this->noteId";
        $result = $this->dbConnection->query($query);
        $noteDescription = $result->fetchAll(PDO::FETCH_ASSOC);
        return $noteDescription[0]['description'];
    }

    public function updateNote(): void
    {
        if (isset($_POST['title'], $_POST['description'], $_POST['id'])) {
            $title = $this->dbConnection->quote($_POST['title']);
            $description = $this->dbConnection->quote($_POST['description']);
            $id = $this->dbConnection->quote($_POST['id']);
            try {
                $query = "UPDATE crud_notes SET title = $title, description = $description WHERE id=$id ";
                $this->dbConnection->exec($query);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}
