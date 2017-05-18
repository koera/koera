<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vendeur
 *
 * @author koera-sam
 */
class Vendeur {

    private $vd_id;
    private $vd_name;
    private $salaire;

    function __construct($vd_id, $vd_name, $salaire) {
        $this->vd_id = $vd_id;
        $this->vd_name = $vd_name;
        $this->salaire = $salaire;
    }

    function getVd_id() {
        return $this->vd_id;
    }

    function getVd_name() {
        return $this->vd_name;
    }

    function getSalaire() {
        return $this->salaire;
    }

    function setVd_id($vd_id) {
        $this->vd_id = $vd_id;
    }

    function setVd_name($vd_name) {
        $this->vd_name = $vd_name;
    }

    function setSalaire($salaire) {
        $this->salaire = $salaire;
    }

    static function ajouterVendeur(PDO $pdo, $vd_name, $salaire) {
        if ($vd_name != NULL && $salaire != NULL) {
            try {
                $prepare = $pdo->prepare('INSERT INTO VENDEUR(vd_name,salaire) VALUES(?,?)');
                $prepare->execute(array($vd_name, $salaire));
                $nb = $prepare->rowCount();
                $prepare->closeCursor();
                return $nb;
            } catch (PDOException $es) {
                echo $es->getMessage();
            }
        }
        return 0;
    }

    static function editVendeur(PDO $pdo, $vd_id, $vd_name, $salaire) {
        try {
            $prepare = $pdo->prepare('UPDATE VENDEUR SET vd_name = ? AND salaire =? WHERE vd_id = ?');
            $prepare->execute(array($vd_name, $salaire, $vd_id));
            $nb = $prepare->rowCount();
            $prepare->closeCursor();
            return $nb;
        } catch (PDOException $es) {
            echo $es->getMessage();
        }
    }

    static function listVendeur(PDO $pdo) {
        try {
            $prepare = $pdo->prepare("SELECT * FROM VENDEUR");
            $prepare->execute();
            $vendeurs = array();
            $i = 0;
            while ($table = $prepare->fetch(PDO::FETCH_NUM)) {
                $vendeurs[$i] = new Vendeur($table[0], $table[1], $table[2]);
                $i ++;
            }
            $prepare->closeCursor();
            return $vendeurs;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    static function getVendeurById(PDO $pdo, $vd_id) {
        try {
            $prepare = $pdo->prepare("SELECT * FROM VENDEUR WHERE vd_id = ?");
            $prepare->execute(array($vd_id));
            while ($table = $prepare->fetch(PDO::FETCH_NUM)) {
                $vendeurs = new Vendeur($table[0], $table[1], $table[2]);
            }
            return $vendeurs;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}
