/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {
    loadListAudit();
});

function loadListAudit() {
    $.ajax({
        url: "../controllers/AuditController.php",
        data: "action=listAudit",
        type: 'POST',
        success: function (data) {
            $('#table_vendeur_audit').html(data);
            $('#example1').DataTable();
        }
    });
}