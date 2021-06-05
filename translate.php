<?php
    include("php/apitranslate.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("templates/head.php");
    ?>
    <title>Inicio</title>
</head>
<body>
    <a href="index.php" class="btn btn-outline-primary text-decoration-none m-3">Volver</a>
    <div class="contenedor">
        <div class="cont_principal_translate w-75 m-auto border p-5 mt-5 rounded shadow">
            <h1 class="text-center fs-1">Traductor</h1>
            <hr>
            <form action="" method="GET" id="form_translate">
                <div class="titulos contenedor_principal">
                    <h2 class="text-center">Entrada</h2>
                    <h2 class="text-center">Salida</h2>
                </div>
                <div class="contenido-translate contenedor_principal">
                    <select class="form-select" aria-label="Default select example" name="Lentrada" id="Lentrada">
                        <option selected value="0">Seleccionar idioma</option>
                        <option value="es">Español</option>
                        <option value="en">Ingles</option>
                        <option value="de">Alemán</option>
                    </select>
                    <select class="form-select" aria-label="Default select example" name="Lsalida" id="Lsalida">
                        <option selected value="0">Seleccionar idioma</option>
                        <option value="es">Español</option>
                        <option value="en">Ingles</option>
                        <option value="de">Alemán</option>
                    </select>
                </div>
                <div class="contenido-translate contenedor_principal mt-3">
                    <textarea class="form-control" aria-label="With textarea" name="textotraducir" id="textotraducir"></textarea>
                    <textarea class="form-control" aria-label="With textarea"  id="textotraducido"><?php echo $word ?></textarea>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Traducir</button>
            </form>
        </div>
    </div>
</body>
    <?php
        include("templates/footer.php");
    ?>
</html>