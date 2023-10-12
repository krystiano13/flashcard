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
        if(!$this->checkPassword($this->password))
            array_push($this->errors, 'password is too short');
        if($this->password !== $this->rep_password) {
            array_push($this->errors, 'passwords are different');
        }

        if($this->errors !== []) {
            echo json_encode(['status' => false, 'errors' => $this->errors]);
            return;
        }

        $database = new Database();
        $database->connect();

        $hash = password_hash($this->password, PASSWORD_DEFAULT);

        $query = $database->connection->prepare(
            "INSERT INTO users VALUES(NULL,:username,:email,:password)"
        );
        $query->bindValue(':username', $this->username);
        $query->bindValue(':email', $this->email);
        $query->bindValue(':password', $hash);

        if($query -> execute()) {
            echo json_encode(['status' => true]);
        }
        else {
            echo json_encode(['status' => false]);
        }
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
            prepare('SELECT username, password FROM users WHERE username=:username');
        $query->bindValue(':username', $this -> username);
        $query->execute();

        $result = $query -> fetchAll();

        if($query -> rowCount() <= 0) {
            array_push($this->errors, 'User does not exists');
            echo json_encode(['status' => false, 'errors' => $this->errors]);
        }

        else {
            if(password_verify($this -> password, $result[0]['password']))
                echo json_encode(['status' => true]);
            else
            {
                array_push($this->errors, 'Wrong password');
                echo json_encode(['status' => false, 'errors' => $this->errors]);
            }
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
        $query -> execute();

        if($query -> rowCount() >= 1) return false;
        return true;
    }

    private function checkPassword(string $password):bool {
        if(strlen($password) < 8) return false;
        return true;
    }
}