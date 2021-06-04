<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("templates/head.php");
    ?>
    <title>Editar <?php echo $_GET['tipo'] ?></title>
</head>
<body>
    <a href="edicion.php?k=<?php echo $_GET['tipo'] ?>" class="btn btn-outline-primary text-decoration-none m-3">Volver</a>
    <?php
        if($_GET['tipo']=="estudiante"){
    ?>
    <div class="card m-auto p-3" style="width: 30rem;">
        <img class="card-img-top" src="img/user.png" alt="Card image cap">
        <hr>
        <div class="card-body">
           <form action="php/actualizar.php?k=estudiante" method="POST" id="update_estudiante">
               <?php
                    include('php/conexion.php');
                    $id = $_GET['id'];
                    $query = "SELECT * FROM estudiantes WHERE ID = '$id'";
                    $result = mysqli_query($conexiondb, $query);

                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">ID</span>
                    </div>
                    <input type="number" class="form-control" value="<?php echo $row['ID'] ?>"  readonly name="id">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Nombre</span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $row['NombreEst'] ?>" name="nombre" id="nombreACT">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Edad</span>
                    </div>
                    <input type="number" class="form-control" value="<?php echo $row['EdadEst'] ?>"  name="edad" id="edadACT">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Curso</span>
                    </div>
                    <select class="form-select" aria-label="Default select example" name="curso" id="cursoACT">
                        <option value="<?php echo $row['CursoEst'] ?>" selected >Seleccione el curso</option>
                        <?php
                            include('php/conexion.php');
                            $query2 = "SELECT * FROM cursos";
                            $result2 = mysqli_query($conexiondb, $query2);

                            while ($row2 = mysqli_fetch_array($result2)) {
                        ?>
                        <option value="<?php echo $row2['ID']?>"><?php echo $row2['NombreCurso']?></option>
                        <?php } ?>
                    </select>
                <button type="submit" class="btn btn-primary fw-bolder m-auto w-75 mt-3">ENVIAR</button>
                </div>
                <?php } ?>
           </form>
        </div>
    </div>
    <?php }else if($_GET['tipo']=="materia"){?>
    <div class="main m-3 p-3 shadow rounded">
        <div class="contenedor_registros">
            <h2>Editar Materias</h2>
            <?php
                include('php/conexion.php');
                $id = $_GET['id'];
                $query = "SELECT * FROM materias WHERE ID = '$id'";
                $result = mysqli_query($conexiondb, $query);

                while ($row = mysqli_fetch_array($result)) {
            ?>
            <form method="POST" id="update_materias" action="php/actualizar.php?k=materia&id=<?php echo $id ?>">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Materia:</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre de la materia" name="materia" id="materiaATC" value="<?php echo $row['NombreMateria']; ?>">
                </div>
                <button type="submit" class="btn btn-primary fw-bolder">ENVIAR</button>
            </form>
            <?php } ?>
        </div>
    </div>
    <?php }else{ ?> 
    <div class="main m-3 p-3 shadow rounded">
        <div class="contenedor_registros">
            <h2>Editar Calificaciones</h2>
            <?php
                include('php/conexion.php');
                $id = $_GET['id'];
                $query = "SELECT * FROM calificaciones WHERE ID = '$id'";
                $result = mysqli_query($conexiondb, $query);

                while ($row = mysqli_fetch_array($result)) {
            ?>
            <form method="POST" id="form_registro_notas" action="php/actualizar.php?k=calificacion&id=<?php echo $id ?>">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Fecha:</span>
                    </div>
                    <input type="date" class="form-control" name="fecha" id="fechaACT" value="<?php echo $row['Fecha'] ?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Estudiante:</span>
                    </div>
                    <select class="form-select" aria-label="Default select example" name="estudiante" id="estudianteACT">
                        <?php
                            $id2 = $row['Estudiante'];
                            $query2 = "SELECT * FROM estudiantes WHERE ID = '$id2'";
                            $result2 = mysqli_query($conexiondb, $query2);

                            while ($row2 = mysqli_fetch_array($result2)) {
                        ?>
                        <option value="<?php echo $row2['ID']?>"><?php echo $row2['NombreEst']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Materia:</span>
                    </div>
                    <select class="form-select" aria-label="Default select example" name="materia" id="materiaACT">
                        <?php
                            $id3 = $row['Materia'];
                            $query3 = "SELECT * FROM materias WHERE ID = '$id3'";
                            $result3 = mysqli_query($conexiondb, $query3);

                            while ($row3 = mysqli_fetch_array($result3)) {
                        ?>
                        <option value="<?php echo $row3['ID']?>"><?php echo $row3['NombreMateria']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text fw-bolder" id="basic-addon1">Calificación:</span>
                    </div>
                    <input type="number" class="form-control" placeholder="Calificación final" name="calificacion" id="calificacionACT" max="10" min="0" value="<?php echo $row['Nota'] ?>">
                </div>
                <button type="submit" class="btn btn-primary fw-bolder">ENVIAR</button>
            </form>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</body>
    <?php
        include("templates/footer.php");
    ?>
</html>