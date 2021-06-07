<!DOCTYPE HTML>
<html>
<head>
    <?php
        include('templates/head.php')
    ?>
	<title>Consultar</title>
</head>
<body>
    <a href="index.php" class="btn btn-outline-primary text-decoration-none m-3">Volver</a>
    <h1 class="text-center">Sección de Consultas</h1>
    <div class="contenedor shadow p-3 w-75 m-auto">
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
    </div>
    <div class="contenedor shadow p-3 w-75 m-auto mt-5">
        <figure class="highcharts-figure">
            <div id="container2"></div>
        </figure>
    </div>
</body>

<?php
    include('templates/footer.php');
?>
<!--GRÁFICAS-->
<script>
    getData();
</script>
</html>
