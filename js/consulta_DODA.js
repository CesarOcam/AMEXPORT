document.getElementById("ejecutar").addEventListener("click", function () {
    const resultadoDiv = document.getElementById("resultado_scrap");
    const spinner = document.getElementById("loadingSpinner");
    
    // Mostrar spinner y limpiar resultados anteriores
    spinner.style.display = "block";
    resultadoDiv.innerHTML = "";
    
    // Deshabilitar el botón durante la consulta
    const boton = document.getElementById("ejecutar");
    boton.disabled = true;
    
    // Iniciar la consulta
    fetch("../../php/modulos/webhook_n8n.php")
        .then(response => {
            if (!response.ok) {
                throw new Error("Error en la respuesta del servidor");
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            
            // Ocultar spinner cuando tengamos los datos
            spinner.style.display = "none";
            
            if (!data || data.error || data.length === 0) {
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            } else {
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
                resultadoDiv.innerHTML = htmlContent;
            }
        })
        .catch(error => {
            console.error("Error en la solicitud:", error);
            spinner.style.display = "none";
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        })
        .finally(() => {
            // Rehabilitar el botón al finalizar (éxito o error)
            boton.disabled = false;
        });
});