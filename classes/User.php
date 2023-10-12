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

    public function register() {

    }

    public function login() {
        $errors = [];
        if(!$this->username) {
            array_push($errors, 'No username provided');
        };

        if(!$this->password) {
            array_push($errors, 'No password provided');
        };

        if($errors !== []) {
            echo json_encode(['status' => false, 'errors' => $errors]);
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

}