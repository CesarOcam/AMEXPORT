$(document).ready(function () {
    $("#eliminarBtn").click(function () {
        // Obtener datos del formulario
        var nombre = $("#nombre2").val();

        // Validación simple
        if (nombre.trim() === "") {
            Swal.fire({
                icon: "warning",
                title: "Campos vacíos",
                text: "Todos los campos son obligatorios.",
                confirmButtonColor: "#3085d6"
            });
            return;
        }

        // Enviar datos por AJAX
        $.ajax({
            type: "POST",
            url: "../../php/modulos/eliminar_URL.php", // Archivo PHP que manejará la base de datos
            data: { nombre: nombre },
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "URL borrada correctamente",
                    confirmButtonColor: "#28a745"
                }).then(() => {
                    $("#form_Url_Borrar")[0].reset(); // Limpia el formulario
                    $("#eliminar_URL").modal("hide"); // Cierra el modal

                    $(".modal-backdrop").remove();
                    $("body").removeClass("modal-open"); // Eliminar la clase que bloquea el scroll

                    // Llamar a la función para recargar la tabla
                    recargarTabla();
                });
            },
            error: function () {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Hubo un problema al eliminar la URL.",
                    confirmButtonColor: "#d33"
                });
            }
        });
    });
});

function recargarTabla() {
    $.ajax({
        type: "GET",
        url: "../../php/modulos/tabla_URL.php", // Archivo PHP que maneja la carga de las URLs
        success: function (data) {
            // Primero vaciamos el tbody
            $("#tabla_1 tbody").empty(); // Elimina todas las filas del <tbody>

            // Asegurarse de que `data` contiene solo las filas (sin etiquetas <tbody>)
            var filas = $(data).find("tbody").html(); // Extrae solo las filas de la tabla

            // Actualiza el tbody con las filas obtenidas
            $("#tabla_1 tbody").html(filas); // Inserta solo las filas del <tbody> en la tabla
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Hubo un problema al recargar la tabla.",
                confirmButtonColor: "#d33"
            });
        }
    });
}
