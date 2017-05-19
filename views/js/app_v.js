/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    getListVendeur();
    $('#vd_name').on('focus', function () {
        $('#vd_name').css('border-color', 'gray');
        $('#vd_name').css('background', 'white');
    });
    $('#salaire').on('focus', function () {
        $('#salaire').css('border-color', 'gray');
        $('#salaire').css('background', '#white');
    });
});
function sendData() {
    var name = $('#vd_name').val();
    var salaire = $('#salaire').val()
    var vd_id = $('#vd_id').val();
    if ($('#btn-send-form-vendeur').val() == 'enregistrer') {
        if (name != '' && salaire != '') {
            $.ajax({
                url: "../controllers/VendeurController.php",
                data: "action=ajouter&vd_name=" + name + "&salaire=" + salaire,
                type: "POST",
                success: function (sucess) {
                    $('#notif').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + sucess + '</div>');
                    $("#vd_name").val('');
                    $("#salaire").val('');
                    getListVendeur();
                }
            });
        } else {
            if (name == '') {
                $('#vd_name').css('border-color', 'red');
                $('#vd_name').css('background', '#ggg978');
            }
            if (salaire == '') {
                $('#salaire').css('border-color', 'red');
                $('#salaire').css('background', '#ggg978');
            }
            $('#notif').html('<b><p style="color:red;">Des champs sont obligatoires</p></b>');
        }
    } else if ($('#btn-send-form-vendeur').val() == 'modifier') {
        if (name != '' && salaire != '') {
            $.ajax({
                url: "../controllers/VendeurController.php",
                data: "action=modifier&vd_name=" + name + "&salaire=" + salaire + "&vd_id=" + vd_id,
                type: "POST",
                success: function (sucess) {
                    $('#notif').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' + sucess + '</div>');
                    $("#vd_name").val('');
                    $("#salaire").val('');
                    getListVendeur();
                }
            });
        } else {
            if (name == '') {
                $('#vd_name').css('border-color', 'red');
                $('#vd_name').css('background', '#ggg978');
            }
            if (salaire == '') {
                $('#salaire').css('border-color', 'red');
                $('#salaire').css('background', '#ggg978');
            }
            $('#notif').html('<b><p style="color:red;">Des champs sont obligatoires</p></b>');
        }
    }
}

function getListVendeur() {
    $.ajax({
        url: "../controllers/VendeurController.php",
        data: "page=list",
        type: "POST",
        success: function (success) {
            $('#table_vendeur').html(success);
            $("#example1").DataTable();
        }
    });
}
function editVendeur(vd_id, vd_name, salaire) {
    $('#vd_id').val(vd_id);
    $('#vd_name').val(vd_name);
    $('#salaire').val(salaire);
    $('#box-title-form').html('Editer');
    $('#btn-send-form-vendeur').val('modifier');
    $('#btn-send-form-vendeur').html('Modifier');
    $('#label_champs_obligatoires').css('display', 'none');
    $('#id_show_btn_cancel').html('<button type="button" onclick="annulerOperation()" class="btn btn-primary">Annuler</button>')
}

function annulerOperation() {
    $('#vd_id').val('');
    $('#vd_name').val('');
    $('#salaire').val('');
    $('#box-title-form').html('Nouveau');
    $('#btn-send-form-vendeur').val('enregister');
    $('#btn-send-form-vendeur').html('Enregistrer');
    $('#id_show_btn_cancel').html('<label class="primary" id="label_champs_obligatoires"><i>(*) : champs obligatoires</i></label>');
    $('#vd_name').css('border-color', 'gray');
    $('#salaire').css('border-color', 'gray');
    $('#notif').html('');
}