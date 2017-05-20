<?php

include_once '../libs/Connection.php';
include_once '../models/AuditVendeur.php';
include_once '../models/Vendeur.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'listAudit') {
        $listAudits = AuditVendeur::listAuditVendeur($pdo);
        $text_table_header = '<table id="example1" class="table table-bordered table-striped"><thead><tr><th>Date</th><th>Nom Vendeur</th><th>Action</th><th>Ancien salaire</th><th>Nouveau salaire</th></tr></thead><tbody>';
        $text_table_footer = '</tbody></table>';
        $table_content = '';
        foreach ($listAudits as $audit) {
            $table_content.='<tr><td>' . $audit->getQuand() . '</td><td>' . $audit->getQui() . '</td><td>' . $audit->getQuoi() . '</td><td>' . $audit->getAncien_salaire() . '</td><td>' . $audit->getNouveau_salaire() . '</td></tr>';
        }
        print $text_table_header . $table_content . $text_table_footer;
    }
}