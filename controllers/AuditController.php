<?php

include_once '../libs/Connection.php';
include_once '../models/AuditVendeur.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'listAudit') {
        $listAudits = AuditVendeur::listAuditVendeur($pdo);
        foreach ($listAudits as $audit) {
            
        }
    }
}