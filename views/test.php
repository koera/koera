<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../libs/Connection.php';
include_once '../models/Vendeur.php';

$v = Vendeur::getVendeurById($pdo, 1);
print $v->getSalaire();