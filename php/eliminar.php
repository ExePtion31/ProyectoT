<?php   
    $id = $_POST['id'];
    $categoria = $_POST['categoria'];

    if($categoria == "estudiantes"){
        try {
            include('conexion.php');
            $stmt = $conexiondb->prepare('DELETE FROM estudiantes WHERE id = ?');
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $stmt2 = $conexiondb->prepare('DELETE FROM calificaciones WHERE Estudiante = ?');
            $stmt2->bind_param("i", $id);
            $stmt2->execute();
    
            if($stmt->affected_rows){
                $respuesta = array(
                    'respuesta' => 'Exito',
                    'categoria' => $categoria
                );
            }else{
                $respuesta = array(
                    'respuesta' => 'Error'
                );
            }
            $stmt->close();
            $stmt2->close();
            $conexiondb ->close();  
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => $e->getMessage()
            );
        }
    }elseif($categoria == "materias"){
        try {
            include('conexion.php');
            $stmt = $conexiondb->prepare('DELETE FROM materias WHERE id = ?');
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $stmt2 = $conexiondb->prepare('DELETE FROM calificaciones WHERE Materia = ?');
            $stmt2->bind_param("i", $id);
            $stmt2->execute();
    
            if($stmt->affected_rows){
                $respuesta = array(
                    'respuesta' => 'Exito',
                    'categoria' => $categoria
                );
            }else{
                $respuesta = array(
                    'respuesta' => 'Error'
                );
            }
            $stmt->close();
            $stmt2->close();
            $conexiondb ->close();  
    
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => $e->getMessage()
            );
        }
    }else{
        try {
            include('conexion.php');
            $stmt = $conexiondb->prepare('DELETE FROM calificaciones WHERE id = ?');
            $stmt->bind_param("i", $id);
            $stmt->execute();
    
            if($stmt->affected_rows){
                $respuesta = array(
                    'respuesta' => 'Exito',
                    'categoria' => $categoria
                );
            }else{
                $respuesta = array(
                    'respuesta' => 'Error'
                );
            }
            $stmt->close();
            $conexiondb ->close();  
    
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => $e->getMessage()
            );
        } 
    }
    die(json_encode($respuesta));

?>