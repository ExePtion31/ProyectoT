<?php
    include('conexion.php');
    $query = "SELECT * FROM materias";
    $result = mysqli_query($conexiondb, $query);

    while ($row = mysqli_fetch_array($result)) {
        $idmateria = $row['ID'];
        $nombremateria = $row['NombreMateria'];

        $query2 = "SELECT Nota FROM calificaciones WHERE Materia = '$idmateria'";
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
                'materia' => $nombremateria,
                'promedio' => $total
            );
        }else{
            $nuevamateria = array(
                'materia' => $nombremateria,
                'promedio' => $total
            );
            array_push($promedios, $nuevamateria);
        }
    }    
    die(json_encode($promedios));
?>