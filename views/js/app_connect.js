/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checkUser() {
    var login = $('#login').val();
    var password = $('#password').val();
    $.ajax({
        url: "http://localhost/trigger/controllers/UsersController.php",
        data: "action=connect&login=" + login + "&password=" + password,
        type: 'GET',
        success: function (data) {
            $('#text-notif-login').html('<center><label style="color: red;">'+data+'</label></center>');
        }, error: function (xhr, status, error) {
            console.log(xhr);
        }
    });
}