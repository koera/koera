<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecetteMois
 *
 * @author koera-sam
 */
class RecetteMois {

    private $rc_m_year;
    private $rc_m_mounth;
    private $rc_m_montant;

    function __construct($rc_m_year, $rc_m_mounth, $rc_m_montant) {
        $this->rc_m_year = $rc_m_year;
        $this->rc_m_mounth = $rc_m_mounth;
        $this->rc_m_montant = $rc_m_montant;
    }

    function getRc_m_year() {
        return $this->rc_m_year;
    }

    function getRc_m_mounth() {
        return $this->rc_m_mounth;
    }

    function getRc_m_montant() {
        return $this->rc_m_montant;
    }

    function setRc_m_year($rc_m_year) {
        $this->rc_m_year = $rc_m_year;
    }

    function setRc_m_mounth($rc_m_mounth) {
        $this->rc_m_mounth = $rc_m_mounth;
    }

    function setRc_m_montant($rc_m_montant) {
        $this->rc_m_montant = $rc_m_montant;
    }

    static function listRecetteMois(PDO $pdo) {
        try {
            $st = $pdo->prepare('SELECT * FROM RECETTES_MOIS');
            $st->execute();
            $list = array();
            $i = 0;
            while ($table = $st->fetch(PDO::FETCH_NUM)) {
                $list[$i] = new RecetteMois($table[0], $table[1], $table[2]);
                $i++;
            }
            $st->closeCursor();
            return $list;
        } catch (Exception $ex) {
            
        }
    }

}
