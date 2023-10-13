<?php

namespace App;
require_once 'Database.php';
require_once '../traits/User.php';

use App\Database;

class Login
{
    use User;
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


}