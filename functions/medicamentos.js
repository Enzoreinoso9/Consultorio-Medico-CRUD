function mostrarTabla(tablaId) {
    
    // Ocultar todas las tablas
    var tablas = document.getElementsByClassName('table-container');
    for (var i = 0; i < tablas.length; i++) {
        tablas[i].style.display = 'none';
    }

    // Mostrar la tabla correspondiente
    document.getElementById(tablaId).style.display = 'block';

     // Quitar la clase "active" de todos los enlaces
     var enlaces = document.getElementsByClassName('nav-link');
     for (var i = 0; i < enlaces.length; i++) {
       enlaces[i].classList.remove('active');
     }
 
     // Agregar la clase "active" al enlace seleccionado
     event.currentTarget.classList.add('active');
}