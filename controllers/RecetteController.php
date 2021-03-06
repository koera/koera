<?php

include_once '../libs/Connection.php';
include_once '../models/RecetteJours.php';
include_once '../models/RecetteMois.php';
include_once '../models/RecetteVendeurMois.php';
include_once '../models/Vendeur.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'list_recette_jour') {
        $list = RecetteJours::listRecetteJours($pdo);
        $table_header = '<table id="example1" class="table table-bordered table-striped"><thead><tr><th>Date</th><th>Montant</th></tr></thead><tbody>';
        $table_content = '';
        $table_footer = '</tbody></table>';
        foreach ($list as $l) {
            $table_content.='<tr><td>' . $l->getRc_j_date() . '</td><td>' . $l->getRc_j_montant() . '</td></tr>';
        }
        print $table_header . $table_content . $table_footer;
    } elseif ($_GET['action'] == 'charger_annee') {
        $annees = RecetteMois::getYear($pdo);
        $select_content = '';
        foreach ($annees as $a) {
            $select_content .= '<option value="' . $a->getRc_m_year() . '">' . $a->getRc_m_year() . '</option>';
        }
        print $select_content;
    } elseif ($_GET['action'] == 'list_recette_mois') {
        $list = RecetteMois::listRecetteMois($pdo, $_GET['year'], $_GET['month']);
        $table_header = '<table id="example2" class="table table-bordered table-striped"><thead><tr><th>Date</th><th>Montant</th></tr></thead><tbody>';
        $table_content = '';
        $table_footer = '</tbody></table>';
        foreach ($list as $l) {
            $table_content.='<tr><td>' . $_GET['month'] . ' - ' . $_GET['year'] . '</td><td>' . $l->getRc_m_montant() . '</td></tr>';
        }
        print $table_header . $table_content . $table_footer;
    } elseif ($_GET['action'] == 'charger_annee_vm') {
        $annees = RecetteVendeurMois::getYear($pdo);
        $select_content = '';
        foreach ($annees as $a) {
            $select_content .= '<option value="' . $a->getRc_vm_year() . '">' . $a->getRc_vm_year() . '</option>';
        }
        print $select_content;
    } elseif ($_GET['action'] == 'charger_vendeur') {
        $annees = RecetteVendeurMois::getVendeur($pdo);
        $select_content = '';
        foreach ($annees as $a) {
            $select_content .= '<option value="' . $a->getVd_id() . '">' . Vendeur::getVendeurById($pdo,$a->getVd_id())->getVd_name() . '</option>';
        }
        print $select_content;
    } elseif ($_GET['action'] == 'list_recette_vendeur_mois') {
        if(isset($_GET['rc_vm_year']) and isset($_GET['rc_vm_mounth']) and isset($_GET['vd_id'])){
            $list = RecetteVendeurMois::listRecetteVendeurMois($pdo,$_GET['rc_vm_year'],$_GET['rc_vm_mounth'],$_GET['vd_id'] );
            $table_header = '<table id="example3" class="table table-bordered table-striped"><thead><tr><th>Nom Vendeur</th><th>Date</th><th>Montant</th></tr></thead><tbody>';
            $table_content = '';
            $table_footer = '</tbody></table>';
            foreach ($list as $l) {
                $table_content.='<tr><td> ' . Vendeur::getVendeurById($pdo,$l->getVd_id())->getVd_name() . ' </td><td>' . $_GET['rc_vm_mounth'] . ' - ' . $_GET['rc_vm_year'] . '</td><td>' . $l->getRc_vm_montant() . '</td></tr>';
            }
            print $table_header . $table_content . $table_footer;
            }
        
    }

}