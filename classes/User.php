<?php

namespace App;

use App\Database;

class User
{
    private string $username;
    private string $email;
    private string $password;
    private string $rep_password;

    public function login() {
        if(!$this->username) return;
        if(!$this->password) return;

        $database = new Database();
        $database->connect();

        $query = $database->connection->
            prepare('SELECT username FROM users WHERE username=":username" AND password=":password"');
        $query->bindValue(':username', $this -> username);
        $query->bindValue(':password', $this -> password);
        $query->execute();

        if($query -> rowCount <= 0) {
            echo "Ni dziala";
        }

        else {
            echo "dziala";
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