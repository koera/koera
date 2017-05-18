<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecetteVendeurMois
 *
 * @author koera-sam
 */
class RecetteVendeurMois {

    private $rc_vm_year;
    private $rc_vm_mounth;
    private $rc_vm_montant;
    private $vd_id;

    function __construct($rc_vm_year, $rc_vm_mounth, $rc_vm_montant, $vd_id) {
        $this->rc_vm_year = $rc_vm_year;
        $this->rc_vm_mounth = $rc_vm_mounth;
        $this->rc_vm_montant = $rc_vm_montant;
        $this->vd_id = $vd_id;
    }

    function getRc_vm_year() {
        return $this->rc_vm_year;
    }

    function getRc_vm_mounth() {
        return $this->rc_vm_mounth;
    }

    function getRc_vm_montant() {
        return $this->rc_vm_montant;
    }

    function getVd_id() {
        return $this->vd_id;
    }

    function setRc_vm_year($rc_vm_year) {
        $this->rc_vm_year = $rc_vm_year;
    }

    function setRc_vm_mounth($rc_vm_mounth) {
        $this->rc_vm_mounth = $rc_vm_mounth;
    }

    function setRc_vm_montant($rc_vm_montant) {
        $this->rc_vm_montant = $rc_vm_montant;
    }

    function setVd_id($vd_id) {
        $this->vd_id = $vd_id;
    }

    static function listRecetteVendeurMois(PDO $pdo) {
        try {
            $st = $pdo->prepare('SELECT * FROM RECETTES_VENDEUR_MOIS');
            $st->execute();
            $list = array();
            $i = 0;
            while ($table = $st->fetch(PDO::FETCH_NUM)) {
                $list[$i] = new RecetteVendeurMois($table[0], $table[1], $table[2], $table[3]);
                $i++;
            }
            $st->closeCursor();
            return $list;
        } catch (Exception $ex) {
            
        }
    }

}
