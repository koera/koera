/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {
    loadYear();
    loadListRecetteJours();
    loadYearVm();
    charger_vendeur();
});
function loadListRecetteJours() {
    $.ajax({
        url: "../controllers/RecetteController.php",
        data: "action=list_recette_jour",
        type: "POST",
        success: function (data) {
            $('#table_recette_jour').html(data);
            $('#example1').DataTable();
        }
    });
}
function loadYear() {
    $.ajax({
        url: "../controllers/RecetteController.php",
        data: "action=charger_annee",
        type: "POST",
        success: function (data) {
            $('#select_year').html(data);
        }
    });
}
function chargerList(year, month) {
    console.log('year', year);
    console.log('month', month);
    $.ajax({
        url: "../controllers/RecetteController.php",
        data: "action=list_recette_mois&year=" + year + "&month=" + month,
        type: "POST",
        success: function (data) {
            $('#table_recette_mois_here').html(data);
            $('#example2').DataTable();
        }
    });
}
function loadYearVm() {
    $.ajax({
        url: "../controllers/RecetteController.php",
        data: "action=charger_annee_vm",
        type: "GET",
        success: function (data) {
            $('#select_year_vm').html(data);
        }
    });
}


function charger_vendeur() {
    $.ajax({
        url: "../controllers/RecetteController.php",
        data: "action=charger_vendeur",
        type: "GET",
        success: function (data) {
            $('#select_vendeur').html(data);
        }
    });

}

function chargerListRecetteVendeur(year, month, vd_id) {
    console.log('year', year);
    console.log('month', month);
    $.ajax({
        url: "../controllers/RecetteController.php",
        data: "action=list_recette_vendeur_mois&rc_vm_year=" + year + "&rc_vm_mounth=" + month + "&vd_id=" + vd_id,
        type: "GET",
        success: function (data) {
            $('#table_recette_mois_vendeur_here').html(data);
            $('#example3').DataTable();
        }
    });
}
