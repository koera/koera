<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuditVendeur
 *
 * @author koera-sam
 */
class AuditVendeur {

    private $quand;
    private $qui;
    private $quoi;
    private $ancien_salaire;
    private $nouveau_salaire;

    function __construct($quand, $qui, $quoi, $ancien_salaire, $nouveau_salaire) {
        $this->quand = $quand;
        $this->qui = $qui;
        $this->quoi = $quoi;
        $this->ancien_salaire = $ancien_salaire;
        $this->nouveau_salaire = $nouveau_salaire;
    }

    function getQuand() {
        return $this->quand;
    }

    function getQui() {
        return $this->qui;
    }

    function getQuoi() {
        return $this->quoi;
    }

    function getAncien_salaire() {
        return $this->ancien_salaire;
    }

    function getNouveau_salaire() {
        return $this->nouveau_salaire;
    }

    function setQuand($quand) {
        $this->quand = $quand;
    }

    function setQui($qui) {
        $this->qui = $qui;
    }

    function setQuoi($quoi) {
        $this->quoi = $quoi;
    }

    function setAncien_salaire($ancien_salaire) {
        $this->ancien_salaire = $ancien_salaire;
    }

    function setNouveau_salaire($nouveau_salaire) {
        $this->nouveau_salaire = $nouveau_salaire;
    }

    static function listAuditVendeur(PDO $pdo) {
        try {
            $st = $pdo->prepare('SELECT * FROM AUDIT_VENDEURS');
            $st->execute();
            $listAudits = array();
            $i = 0;
            while ($table = $st->fetch(PDO::FETCH_NUM)) {
                $listAudits[$i] = new AuditVendeur($table[0], $table[1], $table[2], $table[3], $table[4]);
            }
            $st->closeCursor();
            return $listAudits;
        } catch (Exception $ex) {
            
        }
    }

}
