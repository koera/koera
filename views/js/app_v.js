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
    if (name != '' && salaire != '') {
        $.ajax({
            url: "../controllers/VendeurController.php",
            data: "vd_name=" + name + "&salaire=" + salaire,
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

function disconnect() {
    console.log('disconnect');
     $.ajax({
        url: "../controllers/UsersController.php",
        data: "action=disconnect",
        type: "POST",
        success: function (success) {
           if(success == 'session_end'){
            console.log(success);
            document.location = 'http://localhost/trigger/index.php';
           }
        },error: function (e){
            console.log(e);
        }
    });
}
