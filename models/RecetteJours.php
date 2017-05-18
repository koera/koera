<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecetteJours
 *
 * @author koera-sam
 */
class RecetteJours {

    private $rc_j_date;
    private $rc_j_montant;

    function __construct($rc_j_date, $rc_j_montant) {
        $this->rc_j_date = $rc_j_date;
        $this->rc_j_montant = $rc_j_montant;
    }

    function getRc_j_date() {
        return $this->rc_j_date;
    }

    function getRc_j_montant() {
        return $this->rc_j_montant;
    }

    function setRc_j_date($rc_j_date) {
        $this->rc_j_date = $rc_j_date;
    }

    function setRc_j_montant($rc_j_montant) {
        $this->rc_j_montant = $rc_j_montant;
    }

    static function listRecetteJours(PDO $pdo) {
        try {
            $statement = $pdo->prepare('SELECT * FROM RECETTES_JOUR');
            $statement->execute();
            $list = array();
            $i = 0;
            while ($table = $statement->fetch(PDO::FETCH_NUM)) {
                $list[$i] = new RecetteJours($table[0], $table[1]);
                $i++;
            }
            $statement->closeCursor();
            return $list;
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
    }

}
