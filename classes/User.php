<?php

namespace App;
require_once 'Database.php';

use App\Database;

class User
{
    private string $username;
    private string $email;
    private string $password;
    private string $rep_password;
    private array $errors;

    public function register() {
        $this->errors = [];

        if(!$this->username) array_push($this->errors, 'No username provided');
        if(!$this->password) array_push($this->errors, 'No password provided');
        if(!$this->email) array_push($this->errors, 'No email provided');
        if(!$this->checkUserInfo($this->username, 'username'))
            array_push($this->errors, 'username must be unique');
        if(!$this->checkUserInfo($this->email, 'email'))
            array_push($this->errors, 'email must be unique');

        if($this->errors !== []) {
            echo json_encode(['status' => false, 'errors' => $this->errors]);
            return;
        }

        $database = new Database();
        $database->connect();
    }

    public function login() {
        $this -> errors = [];
        if(!$this->username) {
            array_push($this->errors, 'No username provided');
        };

        if(!$this->password) {
            array_push($this->errors, 'No password provided');
        };

        if($this->errors !== []) {
            echo json_encode(['status' => false, 'errors' => $this->errors]);
            return;
        }

        $database = new Database();
        $database->connect();

        $query = $database->connection->
            prepare('SELECT username FROM users WHERE username=:username AND password=:password');
        $query->bindValue(':username', $this -> username);
        $query->bindValue(':password', $this -> password);
        $query->execute();

        if($query -> rowCount() <= 0) {
            echo json_encode(['status' => false]);
        }

        else {
            echo json_encode(['status' => true]);
        }
    }

    public function setUsername(string $input) {
        $this -> username = $input;
    }

    public function setEmail(string $input) {
        $this -> email = $input;
    }

    public function setPassword(string $input) {
        $this -> password = $input;
    }

    public function setRep_Password(string $input) {
        $this -> rep_password = $input;
    }

    private function checkUserInfo(string $info, string $type): bool {
        $database = new Database();
        $database -> connect();

        $query = $database->connection
            ->prepare("SELECT {$type} FROM users WHERE {$type}=:info");
        $query -> bindValue(':info', $info);

        if($query -> rowCount() >= 1) return false;
        else return true;
    }

}