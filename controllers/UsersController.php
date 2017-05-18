<?php

include_once '../libs/Connection.php';
include_once '../models/Users.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'connect') {
        if (isset($_POST['login']) and isset($_POST['password'])) {
            $users = Users::getUsers($pdo, $_POST['login'], $_POST['password']);
            if ($users != null) {
                session_start();
                $_SESSION["username"] = $users->getLogin();
                //print_r($_SESSION);
                print 'session_begin';
            } else {
                print 'Login ou mot de passe non trouve';
            }
        }
    }
    elseif ($_POST['action'] == 'disconnect') {
        session_destroy();
        unset($_SESSION);
        print 'session_end';
    }
}

