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
            type: "GET",
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
        type: "GET",
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
        type: "GET",
        success: function (success) {
            $('#select_vendeur_here').html(success);
        }
    });
}
function deleteRecette(rc_date, vd_id) {
    console.log('date',rc_date);
    console.log('vd_id',vd_id);
    if (confirm('Voulez vous vraiment supprimer ce recette?')) {
        $.ajax({
            url: "../controllers/RecetteVendeurController.php",
            data: "page=deleteRecette&rc_date=" + rc_date + "&vd_id=" + vd_id,
            type: "GET",
            success: function (success) {
                if (success == 'Suppression reussie') {
                    $('#info-delete').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + success + '</div>');
                } else {
                    $('#info-delete').html('<div class="alert alert-error alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + success + '</div>');
                }
            }
        });
    }
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