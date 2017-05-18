<?php

include_once '../libs/Connection.php';
include_once '../models/Vendeur.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['vd_name']) and isset($_POST['salaire'])) {
    $nb = Vendeur::ajouterVendeur($pdo, $_POST['vd_name'], $_POST['salaire']);
    if ($nb > 0) {
        print 'Insertion reussie';
    }
}
if (isset($_POST['page'])) {
    $list = Vendeur::listVendeur($pdo);
    $text_table_header = '<table id="example1" class="table table-bordered table-striped"><thead><tr><th>Numéro</th><th>Nom Vendeur</th><th>Salaire</th></tr></thead><tbody>';
    $text_table_footer = '</tbody></table>';
    foreach ($list as $l) {
        $text.='<tr>
            <td>' . $l->getVd_id() . ' </td>
            <td>' . $l->getVd_name() . ' </td>
            <td>' . $l->getSalaire() . ' </td>
            </tr>';
    }

    print $text_table_header . $text . $text_table_footer;
}