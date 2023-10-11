<?php

namespace App;

class User
{
    private string $username;
    private string $email;
    private string $password;
    private string $rep_password;

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