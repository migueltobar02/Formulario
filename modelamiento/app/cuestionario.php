<?php

session_start();
if(!isset($_SESSION['Usuario'])){

    echo '
        <script>
            alert("Por Favor debe iniciar sesion");
            window.location= "../index.php";
        </script>
    ';
    session_destroy();
    die();
};

?>


<?php
require_once('config/Db_conect.php');
$conect = conectar();
?>

<!DOCTYPE html >
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cuestionario de preguntas</title>
    <style>
        header{
    text-align: center;
    background: #000;
    color: #fff;
    padding: 10px 0;
}
.container{
    max-width: 600px;
    margin: auto;
    padding: 5px;
}
section{
    border: 2px solid #5624d0;
    border-radius: 7px;
    padding: 10px;
    margin: 5px 0;
}
label{
    display: block;
    padding: 7px;
    border-radius: 7px;
    cursor: pointer;
    border: 1px dashed #ccc;
    margin-bottom: 3px;
}
.center-container {
    max-width: 600px;
    margin: auto;
    padding: 5px;
    border-radius: 8px;
}
.center-button {
            border: 0;
            background-image: linear-gradient(
                150deg,
                #9500ff,
                #09f,
                #00DDFF
            );
            border-radius: 8px;
            color: #fff;
            display: flex;
            font-size: 14px;
            padding: 2px 2px;
            cursor: pointer;
            transition: .3s;
            margin-right: 10px;
            margin-top: 5px;
        }

        .center-button:last-child {
            margin-right: 0;
        }

        .center-button span {
            background-color: #111;
            padding: 8px 14px;
            border-radius: 6px;
            transition: .3s;
            display: inline-block;
            white-space: nowrap;
        }

        .center-button:hover span {
            background: none;
        }

        .center-button:active {
            transform: scale(0.9);
        }

        
    </style>
</head>
<body>
    
    <?php
    // Verificar si se ha proporcionado un ID del formulario en la URL
    if(isset($_GET['id'])) {
        $formularioId = $_GET['id'];

        // Crear la consulta SQL para obtener los detalles del formulario con el ID especificado
        $sql = "SELECT preguntas.*, formulario.nombre AS nombre FROM preguntas JOIN formulario ON preguntas.id_formulario = formulario.id WHERE preguntas.id_formulario = $formularioId";
        $sql1 =  "SELECT nombre from formulario where id = $formularioId";
        $result = mysqli_query($conect, $sql);
        $result1 = mysqli_query($conect, $sql1);
        if ($result1 && $result1->num_rows > 0) {
            $fila = $result1 ->fetch_assoc();
            $nombre1 = $fila["nombre"];
        }
        echo " <header> 
                <h1> $nombre1 </h1>
                </header>
                ";

        // Verificar si se encontraron registros
        if (mysqli_num_rows($result) > 0) {
            // Recorrer los resultados y mostrar los detalles de cada pregunta
            while ($row = mysqli_fetch_assoc($result)) {
                echo  "<div class='container'>";
                    echo"<section >";
                        echo"<label>";
                            echo  $row["pregunta"] . "<br>";
                        echo"</label>";
                        echo"<label>";
                            echo "<input type='radio' name='respuesta[" . $row["id"] . "]' value='verdadero' " . ($row["respuesta"] == "verdadero" ? "checked" : "") . " disabled> Verdadero<br>";
                        echo"</label>";
                        echo"<label>"; 
                            echo "<input type='radio' name='respuesta[" . $row["id"] . "]' value='falso' " . ($row["respuesta"] == "falso" ? "checked" : "") . " disabled> Falso<br>";
                        echo"</label>";
            //echo "<hr>";
                    echo"</section>";
                echo  "</div>";
                
            }
        } else {
            echo "No se encontraron preguntas para el formulario especificado";
        }

        // Liberar los resultados
        mysqli_free_result($result);

    } else {
        echo "No se ha proporcionado un ID de formulario válido";
    }

    // Cerrar la conexión
    mysqli_close($conect);
    ?>
    <div class="center-container">
        <button class="center-button" type="button" onclick="window.location.href  ='ver_formularion.php';"><span>Regresar al inicio</span></button>
    </div>

</body>
</html>

