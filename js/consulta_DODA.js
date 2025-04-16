document.getElementById("ejecutar").addEventListener("click", function () {
    alert("Esto puede tardar varios minutos.");

    fetch("../../php/modulos/webhook_n8n.php") // Llamamos al PHP
        .then(response => {
            if (!response.ok) {
                throw new Error("Error en la respuesta del servidor");
            }
            return response.json(); // Convertimos la respuesta a JSON
        })
        .then(data => {
            console.log(data); // Muestra los datos en consola

            if (!data || data.error || data.length === 0) {
                // Si hay un error o no hay datos, mostrar el modal de error
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            } else {
                // Construir el HTML con los datos recibidos
                let htmlContent = "<h4>Registros Recibidos</h4>";
                htmlContent += "<table class='table table-bordered'><thead><tr><th>Referencia</th><th>Num. Pedimento</th><th>Num. Integración</th><th>Num. Operación</th><th>Fecha y Hora</th><th>Status</th></tr></thead><tbody>";

                data.registros.forEach(registro => {
                    htmlContent += `
                        <tr>
                            <td>${registro.referencia || "N/A"}</td>
                            <td>${registro.numPedimento || "N/A"}</td>
                            <td>${registro.integracion}</td>
                            <td>${registro.oper || "N/A"}</td>
                            <td>${registro.fechaHora || "N/A"}</td>
                            <td>${registro.status || "N/A"}</td>
                        </tr>
                    `;
                });

                htmlContent += "</tbody></table>";

                // Insertar el HTML en el div con id "resultado_scrap"
                document.getElementById("resultado_scrap").innerHTML = htmlContent;
            }
        })
        .catch(error => {
            console.error("Error en la solicitud:", error);
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        });
});

