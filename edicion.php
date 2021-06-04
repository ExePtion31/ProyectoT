<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("templates/head.php");
        $tipo = $_GET['k'];
    ?>
    <title>Editar <?php echo $tipo ?></title>
</head>
<body>
    <a href="index.php" class="btn btn-outline-primary text-decoration-none m-3">Volver</a>
   <div class="contenedor_tablas p-3">
        <?php
            if($tipo == "estudiante"){
        ?>
        <div class="tabla shadow p-3 rounded">
            <h2 class="text-center">EDITAR ESTUDIANTES</h2>
            <hr>
            <table id="tablausers" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Curso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('php/conexion.php');
                        $query = "SELECT * FROM estudiantes";
                        $result = mysqli_query($conexiondb, $query);

                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['ID'] ?></td>
                        <td><?php echo $row['NombreEst'] ?></td>
                        <td><?php echo $row['EdadEst'] ?></td>
                        <?php
                            $cursoEst = $row['CursoEst']; 
                            $query2 = "SELECT * FROM cursos WHERE ID = '$cursoEst'";
                            $result2 = mysqli_query($conexiondb, $query2);
        
                            while ($row2 = mysqli_fetch_array($result2)) { 
                        ?>
                        <td><?php echo $row2['NombreCurso'] ?></td>
                        <?php } ?>
                        <td>
                            <a href="editar.php?id=<?php echo $row['ID']?>&tipo=estudiante" class="btn btn-outline-warning">Editar</a>
                            <a href="" class="btn btn-outline-danger borrar_registro" data-id="<?php echo $row['ID'] ?>" data-tipo="estudiantes">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Curso</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php
            }elseif($tipo == "materia"){
        ?>
        <div class="tabla shadow p-3">
            <h2 class="text-center">EDITAR MATERIAS</h2>
            <hr>
            <table id="tablamaterias" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('php/conexion.php');
                        $query = "SELECT * FROM materias";
                        $result = mysqli_query($conexiondb, $query);
        
                        while ($row = mysqli_fetch_array($result)) { 
                    ?>
                    <tr>
                        <td><?php echo $row['ID'] ?></td>
                        <td><?php echo $row['NombreMateria'] ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['ID']?>&tipo=materia" class="btn btn-outline-warning">Editar</a>
                            <a href="" class="btn btn-outline-danger borrar_registro" data-id="<?php echo $row['ID'] ?>" data-tipo="materias">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php
            }else{
        ?>
        <div class="tabla shadow p-3">
            <h2 class="text-center">EDITAR CALIFICACIONES</h2>
            <hr>
            <table id="tablacalifi" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Estudiante</th>
                        <th>Materia</th>
                        <th>Calificación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('php/conexion.php');
                        $query = "SELECT * FROM calificaciones";
                        $result = mysqli_query($conexiondb, $query);
        
                        while ($row = mysqli_fetch_array($result)) { 
                    ?>
                    <tr>
                        <td><?php echo $row['ID'] ?></td>
                        <td><?php echo $row['Fecha'] ?></td>
                        <?php
                            $est = $row['Estudiante'];
                            $query2 = "SELECT * FROM estudiantes where ID = '$est'";
                            $result2 = mysqli_query($conexiondb, $query2);
            
                            while ($row2 = mysqli_fetch_array($result2)) { 
                        ?>
                        <td><?php echo $row2['NombreEst'] ?></td>
                        <?php } 
                            $mat = $row['Materia'];
                            $query3 = "SELECT * FROM materias where ID = '$mat'";
                            $result3 = mysqli_query($conexiondb, $query3);
            
                            while ($row3 = mysqli_fetch_array($result3)) { 
                        ?>
                        <td><?php echo $row3['NombreMateria'] ?></td>
                        <?php } ?>
                        <td><?php echo $row['Nota'] ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row['ID']?>&tipo=calificacion" class="btn btn-outline-warning">Editar</a>
                            <a href="" class="btn btn-outline-danger borrar_registro" data-id="<?php echo $row['ID'] ?>" data-tipo="calificaciones">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Estudiante</th>
                        <th>Materia</th>
                        <th>Calificación</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php
            }
        ?>
   </div>
</body>
    <?php
        include("templates/footer.php");
    ?>
</html>