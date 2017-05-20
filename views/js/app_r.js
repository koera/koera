/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {
    loadYear();
    loadListRecetteJours();
});
function loadListRecetteJours() {
    $.ajax({
        url: "../controllers/RecetteController.php",
        data: "action=list_recette_jour",
        type: "GET",
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
        type: "GET",
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
        type: "GET",
        success: function (data) {
            $('#table_recette_mois_here').html(data);
            $('#example2').DataTable();
        }
    });
}