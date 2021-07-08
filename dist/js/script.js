// Agregar Usuario
$("#form-user-add").submit(function(event) {
    event.preventDefault();
    add_user();
});

function add_user() {
    var data = {
        "user_id" : $("#user_id").val(),
        "type_id" : $("#type_id").val(),
        "name" : $("#name").val(),
        "contact" : $("#contact").val(),
        "date_birth" : $("#date_birth").val()
    };
    $.ajax({
        data: data,
        url: 'controller/add_user.php',
        type: 'post',
        success: function (response) {
            // Cerrar modal
            $("#add_user_modal").modal("hide");
            // Listar usuarios
            list_users();
            // Vaciar campos
            $("#user_id").val("");
            $("#type_id").val("");
            $("#name").val("");
            $("#contact").val("");
            $("#date_birth").val("");
        }, 
        error: function() {
            console.log("No se ha podido obtener la información");
        }
    });
}
// Mostrar usuarios 
function list_users() {
    $.get("model/list_users.php", {}, function (data, status) {
        $("#list_users").html(data);
    });
}
// Eliminar usuario
function delete_user(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("controller/delete_user.php", { id: id }, function (data, status) {
            // Actualizar usuarios
            list_users();
        });
    }
}
// Consultar datos de un usuarios para actualizar
function list_data_user(id) {
    // Guardar ID en input invisible
    $("#hidden_id").val(id);

    $.ajax({
        data: {"id" : id},
        url: 'controller/list_data_user.php',
        type: 'post',
        success: function (response) {
            var user = JSON.parse(response);
            // Mostrar valores actuales
            $("#update_user_id").val(user.user_id);
            $("#update_type_id").val(user.type_id);
            $("#update_name").val(user.name);
            $("#update_contact").val(user.contact);
            $("#update_date_birth").val(user.date_birth);
            // Abrir modal 
            $("#update_user_modal").modal("show");
        }, 
        error: function() {
            console.log("No se ha podido obtener la información");
        }
    });
}
// Actualizar usuario
$("#form-user-update").submit(function(event) {
    event.preventDefault();
    update_user();
});

function update_user() {
    var data = {
        "id" : $("#hidden_id").val(),
        "user_id" : $("#update_user_id").val(),
        "type_id" : $("#update_type_id").val(),
        "name" : $("#update_name").val(),
        "contact" : $("#update_contact").val(),
        "date_birth" : $("#update_date_birth").val()
    };

    $.ajax({
        data: data,
        url: 'controller/update_user.php',
        type: 'post',
        success: function (response) {
            // Cerrar modal
            $("#update_user_modal").modal("hide");
            // Listar usuarios
            list_users();
        }, 
        error: function() {
            console.log("No se ha podido obtener la información");
        }
    });
}
// Listar usuarios
$(document).ready(function () {
    list_users(); 
});