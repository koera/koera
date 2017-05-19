<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../libs/Connection.php';
include_once '../models/Vendeur.php';

Vendeur::editVendeur($pdo, 13, 'Treize', 1000);
