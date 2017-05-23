/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function saveRecetteVendeur() {

    if ($('#rc_date').val() != '' && $('#rc_montant').val() != '' && $('#select_vendeur').val() != '') {
        if (($('#btn-send-form-recette').val() == 'enregistrer')) {
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
            $.ajax({
                url: "../controllers/RecetteVendeurController.php",
                data: "page=editRecette&rc_date=" + $('#rc_date').val() + "&rc_montant=" + $('#rc_montant').val() + "&vd_id=" + $('#select_vendeur').val(),
                type: "POST",
                success: function (success) {
                    $('#notif').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + success + '</div>');
                    getListRecetteVendeur();
                }
            });
        }
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
            $('#select_vendeur').removeAttr('readonly');
        }
    });
}
function deleteRecette(rc_date, vd_id) {
    if (confirm('Voulez vous vraiment supprimer ce recette?')) {
        $.ajax({
            url: "../controllers/RecetteVendeurController.php",
            data: "page=deleteRecette&rc_date=" + rc_date + "&vd_id=" + vd_id,
            type: "POST",
            success: function (success) {
                if (success == 'Suppression reussie') {
                    $('#info-delete').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + success + '</div>');
                    getListRecetteVendeur();
                } else {
                    $('#info-delete').html('<div class="alert alert-error alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + success + '</div>');
                    getListRecetteVendeur();
                }
            }
        });
    }
}
function editRecette(date, montant, vd_id) {
    $('#rc_date').css('border-color', 'gray');
    $('#rc_date').attr('readonly', 'true');
    $('#rc_date').val(date);

    $('#rc_montant').css('border-color', 'gray');
    $('#rc_montant').val(montant);

    $('#notif').html('');

    $('#box-title-form').html('Editer');
    $('#btn-send-form-recette').val('modifier');
    $('#btn-send-form-recette').html('Modifier');
    $('#label_champs_obligatoires').css('display', 'none');
    $('#id_show_btn_cancel').html('<button type="button" onclick="annulerOperation()" class="btn btn-primary">Annuler</button>')
    $.ajax({
        url: "../controllers/RecetteVendeurController.php",
        data: "page=editRecette&action=checkListUser&vd_id=" + vd_id,
        type: 'POST',
        success: function (data) {
            console.log(data);
            $('#select_vendeur_here').html(data);
            $('#select_vendeur').attr('readonly', true);
        }
    })
}

function annulerOperation() {
    $('#rc_date').val('');
    $('#rc_montant').val('');
    $('#rc_date').removeAttr('readonly');
    $('#box-title-form').html('Nouveau');
    $('#id_show_btn_send').html('<button type="button" id="btn-send-form-recette" value="enregistrer" onclick="saveRecetteVendeur()" class="btn btn-primary">Enregistrer</button>');
    $('#id_show_btn_cancel').html('<label class="primary" id="label_champs_obligatoires"><i>(*) : champs obligatoires</i></label>');
    $('#rc_date').css('border-color', 'gray');
    $('#rc_montant').css('border-color', 'gray');
    $('#notif').html('');
    chargerVendeur();
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