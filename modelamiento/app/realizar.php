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

$respuestasUsuario = array(); // Variable para almacenar las respuestas enviadas

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si la clave "respuesta" existe en $_POST
    if (isset($_POST["respuesta"])) {
        // Obtener respuestas enviadas
        $respuestasUsuario = $_POST["respuesta"];

        // Consultar preguntas y respuestas almacenadas
        $formularioId = $_GET['id'];
        $sql = "SELECT preguntas.*, formulario.nombre AS nombre FROM preguntas JOIN formulario ON preguntas.id_formulario = formulario.id WHERE preguntas.id_formulario = $formularioId";
        $result = $conect->query($sql);

        // Array para almacenar las respuestas correctas
        $respuestasCorrectas = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $preguntaId = $row["id"];
                $respuestaAlmacenada = $row["respuesta"];

                // Verificar si la respuesta enviada coincide con la almacenada
                if (isset($respuestasUsuario[$preguntaId])) {
                    if ($respuestasUsuario[$preguntaId] == $respuestaAlmacenada) {
                        $respuestasCorrectas[$preguntaId] = true;
                    } else {
                        $respuestasCorrectas[$preguntaId] = false;
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cuestionario de preguntas</title>
    <style>
        header {
            margin: auto;
            max-width: 600px;
            text-align: center;
            background: #000;
            color: #fff;
            padding: 10px 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 5px;
        }
        section {
            border: 2px solid #5624d0;
            border-radius: 7px;
            padding: 10px;
            margin: 5px 0;
        }
        label {
            display: block;
            padding: 7px;
            border-radius: 7px;
            cursor: pointer;
            border: 1px dashed #ccc;
            margin-bottom: 3px;
        }
        .respuesta-correcta {
            background-color: lightgreen;
        }
        .respuesta-incorrecta {
            background-color: red;
        }
        .boton {
        display: inline-block;
        padding: 10px 20px;
        background-color: #5624d0;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    /* Estilo al pasar el cursor por encima del botón */
    .boton:hover {
        background-color: #785af6;
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
if (isset($_GET['id'])) {
    $formularioId = $_GET['id'];

    // Consulta para obtener las preguntas y el nombre del formulario
    $sql = "SELECT preguntas.*, formulario.nombre AS nombre FROM preguntas JOIN formulario ON preguntas.id_formulario = formulario.id WHERE preguntas.id_formulario = $formularioId";
    $sql1 =  "SELECT nombre from formulario where id = $formularioId";
    $result = $conect->query($sql);
    $result1 = mysqli_query($conect, $sql1);
        if ($result1 && $result1->num_rows > 0) {
            $fila = $result1 ->fetch_assoc();
            $nombre1 = $fila["nombre"];
        }
        echo " <header> 
                <h1>  $nombre1 </h1>
                </header>
                ";

    if ($result->num_rows > 0) {
        echo "<form method='POST' action=''>";

        while ($row = $result->fetch_assoc()) {
            echo "<div class='container'>";
            echo "<section>";

            echo "<label>";
            echo $row["pregunta"] . "<br>";
            echo "</label>";

            $preguntaId = $row["id"];
            $respuestaAlmacenada = $row["respuesta"];
            $claseRespuesta = "";
            if (isset($respuestasCorrectas[$preguntaId])) {
                if ($respuestasCorrectas[$preguntaId]) {
                    $claseRespuesta = "respuesta-correcta";
                } else {
                    $claseRespuesta = "respuesta-incorrecta";
                }
            }
    
            echo "<label>";
            echo "<input type='radio' name='respuesta[$preguntaId]' value='verdadero' required ";
            if (isset($respuestasUsuario[$preguntaId]) && $respuestasUsuario[$preguntaId] == 'verdadero') {
                echo "checked";
            }
            if (!empty($respuestasUsuario)) {
                echo "disabled";
            }
            echo ">";
            if (isset($respuestasUsuario[$preguntaId]) && $respuestasUsuario[$preguntaId] == 'verdadero') {
                echo "<span class='$claseRespuesta'>Verdadero</span>";
            } else {
                echo "Verdadero";
            }
            echo "</label>";
    
            echo "<label>";
            echo "<input type='radio' name='respuesta[$preguntaId]' value='falso'required  ";
            if (isset($respuestasUsuario[$preguntaId]) && $respuestasUsuario[$preguntaId] == 'falso') {
                echo "checked";
            }
            if (!empty($respuestasUsuario)) {
                echo "disabled";
            }
            echo ">";
            if (isset($respuestasUsuario[$preguntaId]) && $respuestasUsuario[$preguntaId] == 'falso') {
                echo "<span class='$claseRespuesta'>Falso</span>";
            } else {
                echo "Falso";
            }
            echo "</label>";
    
            echo "</section>";
            echo "</div>";
        }
    
        echo "<br>";
        if (empty($respuestasUsuario)) {
            //echo "<input class='center-button'  type='submit' value='Guardar respuestas'>";
            echo"
            <div class='center-container'>
                <button class='center-button'  type='submit'><span>Guardar respuestas</span></button>
            </div>
            ";
        }else{
        //echo"<a href='realizarFormulario.php'>Regresar al inicio</a>";
        echo "
        <div class='center-container'>
            <button class='center-button' onclick=\"window.location.href='realizarFormulario.php'\"><span>Regresar al inicio</span></button>
        </div>";
        
        
    }
        echo "</form>";
    } else {
        echo "No se encontraron preguntas para el formulario especificado";
    }
    
    $result->free_result();
} else {
    echo "No se ha proporcionado un ID de formulario válido";
    }
    
    $conect->close();
   // <button class='boton' onclick=\"window.location.href='realizarFormulario.php'\">Regresar al inicio</button>";
    ?>
    
    </body>
    </html>
