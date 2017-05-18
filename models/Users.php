<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author koera-sam
 */
class Users {

    private $login;
    private $password;
    private $photos;

    function __construct($login, $password, $photos = null) {
        $this->login = $login;
        $this->password = $password;
        $this->photos = $photos;
    }

    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }

    function getPhotos() {
        return $this->photos;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPhotos($photos) {
        $this->photos = $photos;
    }

    static function getUsers(PDO $pdo, $login, $password) {
        try {
            $statement = $pdo->prepare("SELECT * FROM USERS WHERE login = ? AND password = ?");
            $statement->execute(array($login, $password));
            $users = null;
            while ($table = $statement->fetch(PDO::FETCH_NUM)) {
                $users = new Users($table[0], $table[1], $table[2]);
            }
            $statement->closeCursor();
            return $users;
        } catch (PDOException $ex) {
            print $ex->getMessage();
        }
    }
}
