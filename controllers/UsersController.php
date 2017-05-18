<?php

include_once '../libs/Connection.php';
include_once '../models/Users.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'connect') {
        if (isset($_GET['login']) and isset($_GET['password'])) {
            $users = Users::getUsers($pdo, $_GET['login'], $_GET['password']);
            if ($users != null) {
                $_SESSION['username'] = $users->getLogin();
            } else {
                print 'Login ou mot de passe non trouve';
            }
        }
    }
}


