document.addEventListener("DOMContentLoaded", function() {
    const formulario = document.querySelector("#formEquipo");

    if(formulario) {
        formulario.addEventListener("submit", function(e) {
            e.preventDefault(); 
            
            // Limpiar errores
            document.querySelectorAll(".form-control").forEach(i => i.classList.remove("is-invalid"));
            let valido = true;

            // Validar Nombre
            const nombre = document.getElementById("nombre");
            if (nombre.value.trim().length < 3) {
                marcarError(nombre, "Mínimo 3 caracteres");
                valido = false;
            }

            // Validar Ciudad
            const ciudad = document.getElementById("ciudad");
            if (ciudad.value.trim().length < 2) {
                marcarError(ciudad, "Ciudad obligatoria");
                valido = false;
            }

            // Validar Capacidad
            const cap = document.getElementById("capacidad_estadio");
            if (cap.value < 500 || isNaN(cap.value)) {
                marcarError(cap, "Mínimo 500 espectadores");
                valido = false;
            }

            // Validar Fecha
            const fecha = document.getElementById("fecha_fundacion");
            if (!fecha.value || new Date(fecha.value) > new Date()) {
                marcarError(fecha, "La fecha no puede ser futura");
                valido = false;
            }

            if (valido) formulario.submit(); 
        });
    }

    function marcarError(input, msg) {
        input.classList.add("is-invalid");
        let feedback = input.nextElementSibling;
        if(feedback) feedback.innerText = msg;
    }
});