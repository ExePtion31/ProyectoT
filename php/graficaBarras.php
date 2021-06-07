<?php
    include('conexion.php');
    $query = "SELECT * FROM estudiantes";
    $result = mysqli_query($conexiondb, $query);

    while ($row = mysqli_fetch_array($result)) {
        $idestudiante = $row['ID'];
        $nombrestudiante = $row['NombreEst']; 

        $query2 = "SELECT Nota FROM calificaciones WHERE Estudiante = '$idestudiante'";
        $result2 = mysqli_query($conexiondb, $query2);
        $contador = 0;
        $sumatoria = 0;

        while ($row2 = mysqli_fetch_array($result2)) {
            $sumatoria += $row2['Nota'];
            $contador += 1;
        }
        $total = $sumatoria / $contador;
        if(!isset($promedios)){
            $promedios[] = array(
                'estudiante' => $nombrestudiante,
                'promedio' => $total
            );
        }else{
            $nuevoestudiante = array(
                'estudiante' => $nombrestudiante,
                'promedio' => $total
            );
            array_push($promedios, $nuevoestudiante);
        }
    }    
    die(json_encode($promedios));
?>