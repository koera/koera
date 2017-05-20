<?php

include_once '../libs/Connection.php';
include_once '../models/RecetteVendeur.php';
include_once '../models/Vendeur.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ((isset($_GET['rc_date'])) and isset($_GET['rc_montant']) and isset($_GET['vd_id'])) {
    $nombre = RecetteVendeur::ajouterRecetteVendeur($pdo, $_GET['rc_date'], $_GET['rc_montant'], $_GET['vd_id']);
    if ($nombre > 0) {
        print 'Insertion reussie';
    }
}
if (isset($_GET['page'])) {
    if ($_GET['page'] == 'list') {
        $list = RecetteVendeur::listRecetteVendeur($pdo);
        $text_table_header = '<table id="example1" class="table table-bordered table-striped"><thead><tr><th>Date</th><th>Nom Vendeur</th><th>Recette</th><th></th></tr></thead><tbody>';
        $text_table_footer = '</tbody></table>';
        $text = '';
        foreach ($list as $l) {
            $text.='<tr>
            <td>' . $l->getRc_date() . ' </td>
            <td>' . Vendeur::getVendeurById($pdo, $l->getVd_id())->getVd_name() . ' </td>
            <td>' . $l->getRc_montant() . ' </td>
            <td> <a href="#" onclick="deleteRecette(\'' . $l->getRc_date() . '\',\'' . $l->getVd_id() . '\')"><i class="fa fa-trash"></i> </a> | <a href="#" > <i class="fa fa-edit"></i></a> </td>
            </tr>';
        }
        print $text_table_header . $text . $text_table_footer;
    } elseif ($_GET['page'] == 'chargerVendeur') {
        $text_select_begin = '<select class="form-control select2" style="width: 100%;" id="select_vendeur">';
        $list_vendeur = Vendeur::listVendeur($pdo);
        $text_select_option = '';
        foreach ($list_vendeur as $vendeur)
            $text_select_option .= '<option value="' . $vendeur->getVd_id() . '"> ' . $vendeur->getVd_name() . '</option>';
        $text_select_end = '</select>';
        print $text_select_begin . $text_select_option . $text_select_end;
    } elseif ($_GET['page'] == 'deleteRecette') {
        if (isset($_GET['rc_date']) and isset($_GET['vd_id'])) {
            $nb = RecetteVendeur::deleteRecette($pdo, $date, $vd_id);
            if ($nb > 0) {
                print 'Suppression reussie';
            } else {
                print 'Suppression ehoue';
            }
        }
    }
}