<?php

namespace App;

class Database
{
    private static string $username = "root";
    private static string $host = "localhost";
    private static string $password = "";
    private static string $dbName = "flashcard";

    public $connection;

    public function connect() {
        $this -> connection = new \PDO(
            "mysql:host={$this::$host};dbname={$this::$dbName}",
            $this::$username,
            $this::$password,
            [
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]
        );
    }
}