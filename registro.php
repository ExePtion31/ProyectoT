<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("templates/head.php");
        $tipo = $_GET['k'];
    ?>
    <title>Registrar <?php echo $tipo ?></title>
</head>
<body>
    <a href="index.php" class="btn btn-outline-primary text-decoration-none m-3">Volver</a>
    <?php
        if($tipo == "estudiante"){
    ?>
    <div class="main m-3 p-3 shadow rounded">
        <div class="contenedor_registros">
            <h2>Registrar Estudiantes</h2>
            <form method="POST" id="form_registro_est" action="php/registro.php?k=estudiantes">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Nombre:</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre del estudiante" name="nombre" id="nombreRE">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Edad:</span>
                    </div>
                    <input type="number" class="form-control" placeholder="Edad" name="edad" id="edadRE">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Curso:</span>
                    </div>
                    <select class="form-select" aria-label="Default select example" name="curso" id="gradoRE">
                        <option value="0" selected >Seleccione un curso</option>
                        <?php
                            include('php/conexion.php');
                            $query = "SELECT * FROM cursos";
                            $result = mysqli_query($conexiondb, $query);

                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row['ID'] ?>"><?php echo $row['NombreCurso'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary fw-bolder">ENVIAR</button>
            </form>
        </div>
    </div>
    <?php
        }elseif($tipo == "materia"){
    ?>
    <div class="main m-3 p-3 shadow rounded">
        <div class="contenedor_registros">
            <h2>Registrar Materias</h2>
            <form method="POST" id="form_registro_mate" action="php/registro.php?k=materias">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Materia:</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre de la materia" name="materia" id="materiaRM">
                </div>
                <button type="submit" class="btn btn-primary fw-bolder">ENVIAR</button>
            </form>
        </div>
    </div>
    <?php
        }else{
    ?>
    <div class="main m-3 p-3 shadow rounded">
        <div class="contenedor_registros">
            <h2>Calificaciones Finales</h2>
            <form method="POST" id="form_registro_notas" action="php/registro.php?k=calificaciones">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Fecha:</span>
                    </div>
                    <input type="date" class="form-control" name="fecha" id="fechaRCF">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Estudiante:</span>
                    </div>
                    <select class="form-select" aria-label="Default select example" name="estudiante" id="estudianteRCF">
                        <option value="0" selected >Seleccione un estudiante</option>
                        <?php
                            include('php/conexion.php');
                            $query = "SELECT * FROM estudiantes";
                            $result = mysqli_query($conexiondb, $query);

                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row['ID']?>"><?php echo $row['NombreEst']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Materia:</span>
                    </div>
                    <select class="form-select" aria-label="Default select example" name="materia" id="materiaRCF">
                        <option value="0" selected >Seleccione una materia</option>
                        <?php
                            include('php/conexion.php');
                            $query2 = "SELECT * FROM materias";
                            $result2 = mysqli_query($conexiondb, $query2);

                            while ($row2 = mysqli_fetch_array($result2)) {
                        ?>
                        <option value="<?php echo $row2['ID']?>"><?php echo $row2['NombreMateria']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Calificación:</span>
                    </div>
                    <input type="number" class="form-control" placeholder="Calificación final" name="calificacion" id="calificacionRCF" max="10" min="0">
                </div>
                <button type="submit" class="btn btn-primary fw-bolder">ENVIAR</button>
            </form>
        </div>
    </div>
    <?php } ?>
</body>
    <?php
        include("templates/footer.php");    
    ?>
</html>