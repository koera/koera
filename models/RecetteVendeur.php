<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecetteVendeur
 *
 * @author koera-sam
 */
class RecetteVendeur {

    private $rc_date;
    private $rc_montant;
    private $vd_id;

    function __construct($rc_date, $rc_montant, $vd_id) {
        $this->rc_date = $rc_date;
        $this->rc_montant = $rc_montant;
        $this->vd_id = $vd_id;
    }

    function getRc_date() {
        return $this->rc_date;
    }

    function getRc_montant() {
        return $this->rc_montant;
    }

    function getVd_id() {
        return $this->vd_id;
    }

    function setRc_date($rc_date) {
        $this->rc_date = $rc_date;
    }

    function setRc_montant($rc_montant) {
        $this->rc_montant = $rc_montant;
    }

    function setVd_id($vd_id) {
        $this->vd_id = $vd_id;
    }

    static function ajouterRecetteVendeur(PDO $pdo, $rc_date, $rc_montant, $vd_id) {
        try {
            $statement = $pdo->prepare('INSERT INTO RECETTES_VENDEUR VALUES (?,?,?)');
            $statement->execute(array($rc_date, $rc_montant, $vd_id));
            $nb = $statement->rowCount();
            $statement->closeCursor();
            return $nb;
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }

    static function listRecetteVendeur(PDO $pdo) {
        try {
            $statement = $pdo->prepare('SELECT * FROM RECETTES_VENDEUR');
            $statement->execute();
            $list = array();
            $counter = 0;
            while ($table = $statement->fetch(PDO::FETCH_NUM)) {
                $list[$counter] = new RecetteVendeur($table[0], $table[1], $table[2]);
                $counter++;
            }
            $statement->closeCursor();
            return $list;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
