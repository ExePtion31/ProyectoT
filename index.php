<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("templates/head.php");
    ?>
    <title>Inicio</title>
</head>
<body>
    <div class="contenedor_principal p-3">
        <div class="container text-center rounded p-3 contenedor_opciones">
            <h3>SECCIÓN DE REGISTRO</h3>
            <hr>
            <i class="fas fa-pen-alt display-1 icono"></i>
            <div class="opciones">
                <a href="registro.php?k=estudiante" class="text-decoration-none">
                    <p>Registrar Estudiante</p>
                </a>
            </div>
            <div class="opciones">
                <a href="registro.php?k=materia" class="text-decoration-none">
                    <p>Registrar Materia</p>
                </a>
            </div>
            <div class="opciones">
                <a href="registro.php?k=calificacion" class="text-decoration-none">
                    <p>Registrar Calificaciones</p>
                </a>
            </div>
        </div>
            <div class="container text-center rounded p-3 contenedor_opciones">
                <h3>SECCIÓN DE EDICIÓN</h3>
                <hr>
                <i class="fas fa-edit display-1 icono"></i>
                <div class="opciones">
                    <a href="edicion.php?k=estudiante" class="text-decoration-none">
                        <p>Editar Estudiante</p>
                    </a>
                </div>
                <div class="opciones">
                    <a href="edicion.php?k=materia" class="text-decoration-none">
                        <p>Editar Materia</p>
                    </a>
                </div>
                <div class="opciones">
                    <a href="edicion.php?k=calificacion" class="text-decoration-none">
                        <p>Editar Calificaciones</p>
                    </a>
                </div>
            </div>
        <a href="" class="text-decoration-none">
            <div class="container text-center rounded p-3 contenedor_opciones">
                <h3>SECCIÓN DE CONSULTAS</h3>
                <hr>
                <i class="fas fa-search display-1 icono"></i>
            </div>
        </a>
        <a href="" class="text-decoration-none">
            <div class="container text-center rounded p-3 contenedor_opciones">
                <h3>SECCIÓN DE TRADUCCIÓN</h3>
                <hr>
                <i class="fas fa-language display-1 icono"></i>
            </div>
        </a>
    </div>
</body>
    <?php
        include("templates/footer.php");
    ?>
</html>