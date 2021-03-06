<?php

include_once '../libs/Connection.php';
include_once '../models/Vendeur.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'ajouter') {
        if (isset($_POST['vd_name']) and isset($_POST['salaire'])) {
            $nb = Vendeur::ajouterVendeur($pdo, $_POST['vd_name'], $_POST['salaire']);
            if ($nb > 0) {
                print 'Insertion reussie';
            }
        }
    } elseif ($_POST['action'] == 'modifier') {
        if (isset($_POST['vd_name']) and isset($_POST['salaire']) and isset($_POST['vd_id'])) {
            $nb = Vendeur::editVendeur($pdo, $_POST['vd_id'], $_POST['vd_name'], $_POST['salaire']);
            if ($nb > 0) {
                print 'Modification reussie';
            } else {
                print 'Aucune modification';
            }
        }
    } elseif ($_POST['action'] == 'supprimer') {
        if (isset($_POST['vd_id'])) {
            $nb = Vendeur::removeVendeur($pdo, $_POST['vd_id']);
            if ($nb > 0) {
                print 'Suppression reussie';
            } else {
                print 'Suppression echoue';
            }
        }
    }
} else {
    if (isset($_POST['page'])) {
        $list = Vendeur::listVendeur($pdo);
        $text_table_header = '<table id="example1" class="table table-bordered table-striped"><thead><tr><th>Numéro</th><th>Nom Vendeur</th><th>Salaire</th><th></th></tr></thead><tbody>';
        $text_table_footer = '</tbody></table>';
        $text = '';
        foreach ($list as $l) {
            $text.='<tr>
            <td>' . $l->getVd_id() . ' </td>
            <td>' . $l->getVd_name() . ' </td>
            <td>' . $l->getSalaire() . ' </td>
            <td> <a href="#" onclick="removeVendeur(\'' . $l->getVd_id() . '\')"><i class="fa fa-trash"></i> </a> | <a href="#" onclick="editVendeur(\'' . $l->getVd_id() . '\',\'' . $l->getVd_name() . '\',\'' . $l->getSalaire() . '\')"> <i class="fa fa-edit"></i></a> </td>
            </tr>';
        }
        print $text_table_header . $text . $text_table_footer;
    }
}