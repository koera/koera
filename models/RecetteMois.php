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

    function __construct($rc_m_year = null, $rc_m_mounth = null, $rc_m_montant = null) {
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

    static function listRecetteMois(PDO $pdo, $year = null, $month = null) {
        try {
            if ($year == null and $month == null) {
                $st = $pdo->prepare('SELECT * FROM RECETTES_MOIS');
                $st->execute();
            } else {
                $st = $pdo->prepare('SELECT * FROM RECETTES_MOIS WHERE rc_m_year = ? and rc_m_mounth = ?');   
                $st->execute(array($year, $month));
            }
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

    static function getYear(PDO $pdo) {
        try {
            $st = $pdo->prepare('SELECT DISTINCT(rc_m_year) FROM RECETTES_MOIS');
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

    static function getMonth(PDO $pdo, $year) {
        try {
            $st = $pdo->prepare('SELECT DISTINCT(rc_m_mounth) FROM RECETTES_MOIS WHERE rc_m_year = ?');
            $st->execute(array($year));
            $list = array();
            $i = 0;
            while ($table = $st->fetch(PDO::FETCH_ASSOC)) {
                $list[$i] = new RecetteMois(null, $table['rc_m_mounth'], null);
                $i++;
            }
            $st->closeCursor();
            return $list;
        } catch (Exception $ex) {
            
        }
    }

}
