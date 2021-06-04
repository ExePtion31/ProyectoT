<?php
    include('conexion.php');

    if($_GET['k']=="estudiante"){
        if(isset($_POST['id'])){
            try{
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $edad = $_POST['edad'];
                $curso = $_POST['curso'];
    
                include("conexion.php");
                $stmt = $conexiondb->prepare('UPDATE estudiantes SET NombreEst = ?, EdadEst = ?, CursoEst = ? WHERE ID = ?');
                $stmt->bind_param("siii", $nombre, $edad, $curso, $id);
                $stmt->execute();
        
                if($stmt->affected_rows){
                    $respuesta = array(
                        'respuesta' => 'Exito'
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'Error'
                    ); 
                }
                $stmt->close();
                $conexiondb ->close();  
            }catch (Exception $e) {
                echo "Error:" . $e->getMessage();  
            }
        die(json_encode($respuesta));
        }
    }else if($_GET['k']=="materia"){
        if(isset($_GET['id'])){
            try{
                $id = $_GET['id'];
                $materia = $_POST['materia'];
    
                include("conexion.php");
                $stmt = $conexiondb->prepare('UPDATE materias SET NombreMateria = ? WHERE ID = ?');
                $stmt->bind_param("si", $materia, $id);
                $stmt->execute();
        
                if($stmt->affected_rows){
                    $respuesta = array(
                        'respuesta' => 'Exito'
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'Error'
                    ); 
                }
                $stmt->close();
                $conexiondb ->close();  
            }catch (Exception $e) {
                echo "Error:" . $e->getMessage();  
            }
        }
    }
    
    die(json_encode($respuesta));
?>