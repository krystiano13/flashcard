<?php

namespace App;
require_once 'Database.php';
require_once '../traits/User.php';

use App\Database;

class Register
{
    use User;

    private function addUserDataColumn(): bool {
        $database = new Database();
        $database->connect();

        $query = $database->connection->prepare(
            "INSERT INTO userdata VALUES(NULL,:username,:date,0,0,0,0)"
        );

        $date = new \DateTime('now');

        $query -> bindValue(':username', $this->username);
        $query -> bindValue(':date', $date -> format('Y-m-d'));

        if($query -> execute()) {
            return true;
        }

        else {
            return false;
        }
    }

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
            $this->addUserDataColumn();
        }
        else {
            echo json_encode(['status' => false]);
        }
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