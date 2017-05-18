/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function saveRecetteVendeur() {
    if ($('#rc_date').val() != '' && $('#rc_montant').val() != '' && $('#select_vendeur').val() != '') {
        $.ajax({
            url: "../controllers/RecetteVendeurController.php",
            data: "rc_date=" + $('#rc_date').val() + "&rc_montant=" + $('#rc_montant').val() + "&vd_id=" + $('#select_vendeur').val(),
            type: "POST",
            success: function (success) {
                $('#notif').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + success + '</div>');
                getListRecetteVendeur();
            }
        });
    } else {
        if ($('#rc_date').val() == '') {
            $('#rc_date').css('border-color', 'red');
            $('#rc_date').css('background', '#ggg978');
        }
        if ($('#rc_montant').val() == '') {
            $('#rc_montant').css('border-color', 'red');
            $('#rc_montant').css('background', '#ggg978');
        }
        $('#notif').html('<b><p style="color:red;">Des champs sont obligatoires</p></b>');
    }
}
function getListRecetteVendeur() {
    $.ajax({
        url: "../controllers/RecetteVendeurController.php",
        data: "page=list",
        type: "POST",
        success: function (success) {
            $('#table_vendeur').html(success);
            $("#example1").DataTable();
        }
    });
}
function chargerVendeur() {
    $.ajax({
        url: "../controllers/RecetteVendeurController.php",
        data: "page=chargerVendeur",
        type: "POST",
        success: function (success) {
            $('#select_vendeur_here').html(success);
        }
    });
}
$(function () {
    $("#rc_date").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
    getListRecetteVendeur();
    chargerVendeur();
    $('#rc_date').on('focus', function () {
        $('#rc_date').css('border-color', 'gray');
        $('#rc_date').css('background', 'white');
    });
    $('#rc_montant').on('focus', function () {
        $('#rc_montant').css('border-color', 'gray');
        $('#rc_montant').css('background', '#white');
    });
});