<?php

declare(strict_types=1);

namespace App;

use PDO;

class Database
{
    private PDO $dbConnection;

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
}
