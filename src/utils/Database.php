<?php

declare(strict_types=1);

namespace App;

use PDO;

class Database
{
    public function __construct($dbConfig)
    {
        $this->createConnection($dbConfig);
    }

    private function createConnection($dbConfig)
    {
        try {
            $dsn = "mysql:dbname={$dbConfig['db']['database']};host={$dbConfig['db']['host']}";
            $dbConnection = new PDO(
                $dsn,
                $dbConfig['db']['user'],
                $dbConfig['db']['password'],
            );
            echo "Connection Succesful";
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
