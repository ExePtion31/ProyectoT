<?php
    include("conexion.php");

    if($_GET['k'] == "materias"){
        if(isset($_POST['materia'])){
            $materia = $_POST['materia'];

            try {

                $stmt = $conexiondb->prepare("INSERT INTO materias (NombreMateria) VALUES (?)");
                $stmt->bind_param("s", $materia);
                $stmt->execute();
                $id_registro = $stmt->insert_id;

                if($id_registro > 0){
                  $respuesta = array(
                    'respuesta'=> 'Exito'
                  );
                }else{
                  $respuesta = array(
                    'respuesta'=> 'Error'
                  );
                }
                $stmt->close();
                $conexiondb->close();
            } catch (Exception $e) {
                echo "Error:" . $e->getMessage();  
            }
        }
        die(json_encode($respuesta)); 
    }elseif($_GET['k'] == "estudiantes"){
        if(isset($_POST['nombre'])){

            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $curso = $_POST['curso'];

            try {

                $stmt = $conexiondb->prepare("INSERT INTO estudiantes (NombreEst, EdadEst, CursoEst) VALUES (?, ?, ?)");
                $stmt->bind_param("sii", $nombre, $edad, $curso);
                $stmt->execute();
                $id_registro = $stmt->insert_id;

                if($id_registro > 0){
                  $respuesta = array(
                    'respuesta'=> 'Exito'
                  );
                }else{
                  $respuesta = array(
                    'respuesta'=> 'Error'
                  );
                }
                $stmt->close();
                $conexiondb->close();
            } catch (Exception $e) {
                echo "Error:" . $e->getMessage();  
            }
        }
        die(json_encode($respuesta)); 
    }elseif($_GET['k'] == "calificaciones"){
        if(isset($_POST['fecha'])){

            $fecha = $_POST['fecha'];
            $estudiante = $_POST['estudiante'];
            $materia = $_POST['materia'];
            $nota = $_POST['calificacion'];

            try {

                $stmt = $conexiondb->prepare("INSERT INTO calificaciones (Fecha, Estudiante, Materia, Nota) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("siii", $fecha, $estudiante, $materia, $nota);
                $stmt->execute();
                $id_registro = $stmt->insert_id;

                if($id_registro > 0){
                  $respuesta = array(
                    'respuesta'=> 'Exito'
                  );
                }else{
                  $respuesta = array(
                    'respuesta'=> 'Error'
                  );
                }
                $stmt->close();
                $conexiondb->close();
            } catch (Exception $e) {
                echo "Error:" . $e->getMessage();  
            }
        }
        die(json_encode($respuesta)); 
    }
?>