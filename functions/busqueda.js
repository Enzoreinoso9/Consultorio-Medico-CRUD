
    document.getElementById("buscarForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

        // Obtiene el término de búsqueda
        var query = document.getElementById("buscar").value.trim().toLowerCase();

        // Verifica si la búsqueda coincide 
        if (query.includes("empleados")) {
            window.location.href = "empleados.php";
        } else if (query.includes("pacientes")) {
            window.location.href = "pacientes.php";
        } else if (query.includes("medicos")) {
            window.location.href = "medicos.php";
        } else if (query.includes("citas")) {
            window.location.href = "citas.php";
        } else if (query.includes("cronograma")) {
            window.location.href = "cronograma.php";
        } else if (query.includes("direcciones")) {
            window.location.href = "direcciones.php";
        } else if (query.includes("documentaciones")) {
            window.location.href = "documentacion.php";
        } else if (query.includes("medicamentos")) {
            window.location.href = "medicamentos.php";
        } else if (query.includes("sustituciones")) {
            window.location.href = "sustituciones.php";
        } else if (query.includes("vacaciones")) {
            window.location.href = "vacaciones.php";
        } else if (query.includes("menu")) {
            window.location.href = "menu.php";
        } else {
            // Si la búsqueda no coincide con ninguna búsqueda 
            alert("No se encontraron resultados para la búsqueda: " + query);
        }
    });