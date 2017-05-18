<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the edit
 */
try {
    $pdo = new PDO('mysql:host=localhost;dbname=db_trigger', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $ex) {
    print $ex->getMessage();
}
