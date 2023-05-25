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

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejemplo de formulario dinámico</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;800&display=swap');
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Nunito', sans-serif;
            font-size: 20px;
        }

        .h {
            background: linear-gradient(
                90deg,
                rgba(2, 0, 36, 1) 0%,
                rgba(75, 14, 154, 1) 35%,
                rgba(0, 212, 255, 1) 100%
            );
            font-family: "Poppins", sans-serif;
            width: 100%;
            clear: both;
            content: '';
            display: table;
        }

        .menu {
            width: 900px;
            margin: 0 auto;
        }

        nav {
            float: right;
        }

        nav ul li {
            list-style: none;
            margin-left: 75px;
            padding: 12px 0;
            float: left;
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        li:hover {
            transform: scale(1.1);
        }

        nav ul li a::before {
            display: block;
            content: '';
            width: 0%;
            background: #fff;
            height: 5px;
            top: 0;
            position: absolute;
            transition: width 0.2s;
        }

        nav ul li a:hover::before {
            width: 100%;
        }

        header {
            text-align: center;
            background: #000;
            color: #fff;
            padding: 10px 0;
        }

        .container {
            max-width: 700px;
            margin: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        fieldset {
            border: 2px solid #5624d0;
            border-radius: 7px;
            padding: 10px;
            margin: auto;
        }

        label {
            display: block;
            padding: 7px;
            border-radius: 7px;
            cursor: pointer;
            margin-bottom: 3px;
        }

        #preguntaformulario {
            color: rgba(0, 0, 0, 0.87);
            border-bottom-color: rgba(0, 0, 0, 0.42);
            box-shadow: none !important;
            border: none;
            border-bottom: 1px solid;
            border-radius: 4px 4px 0 0;
            width: 100%;
            height: 35px;
            resize: none;
        }



        button {
            display: block;
            margin-top: 10px;
        }

        .botones {
            display: flex;
            justify-content: center;
            margin-top: 8px;
        }

        .botones button {
            margin: 0 5px;
        }

        .btn {
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

        .btn:last-child {
            margin-right: 0;
        }

        .btn span {
            background-color: #111;
            padding: 8px 14px;
            border-radius: 6px;
            transition: .3s;
            display: inline-block;
            white-space: nowrap;
        }

        .btn:hover span {
            background: none;
        }

        .btn:active {
            transform: scale(0.9);
        }

        /* Media queries */
        @media (max-width: 900px) {
            .menu {
                width: 100%;
            }

            nav ul li {
                margin-left: 25px;
            }
        }

        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }

            #preguntaformulario {
                width: 100%;
            }

        }

        @media (max-width: 500px) {
            .container {
                max-width: 100%;
            }

            textarea,
            input[type="radio"] {
                width: auto;
            }

            .btn span{
                padding: 6px 10px;
                font-size: 12px;
            }
        }

    </style>
</head>

<body>
    <div>
        <header class="h">
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="acerca_de.php">Acerca de</a></li>
                        <li><a href="ver_formularion.php">Ver formularios</a></li>
                        <li><a href="cerrar_session.php">Cerrar sesión</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>

    <div class="container">
        <form id="mi-formulario" action="insertar.php" method="POST">
            <fieldset>
                <legend>Titulo del formulario</legend>
                <textarea id="preguntaformulario" name="NombreFormulario" rows="10" cols="50" placeholder="Ingrese título"
                    value="Formulario sin título" required></textarea>
                <p style="margin-top: 10px;">Seleccione la respuesta correcta</p>
            </fieldset>
            <fieldset>
                <legend>Pregunta 1</legend>
                <label for="pregunta-1">Pregunta:</label>
                <textarea id="mi-textarea" name="pregunta1" rows="20" cols="50" style="width: 100%; height: 60px;" placeholder="Inserte pregunta" required></textarea>
                <br>
                <label for="respuesta-1">Respuesta:</label>
                <label for="respuesta1_v">
                    <input type="radio" value="verdadero" name="respuesta1" id="respuesta1_v" required>Verdadero
                </label>
                <label for="respuesta1_f">
                    <input type="radio" value="falso" name="respuesta1" id="respuesta1_f" required>Falso
                </label>
            </fieldset>
            <fieldset>
                <legend>Pregunta 2</legend>
                <label for="pregunta-2">Pregunta:</label>
                <textarea id="mi-textarea" name="pregunta2" rows="20" cols="50" placeholder="Inserte pregunta" style="width: 100%; height: 60px;" required></textarea>
                <br>
                <label for="respuesta-2">Respuesta:</label>
                <label for="respuesta2_v">
                    <input type="radio" value="verdadero" name="respuesta2" id="respuesta2_v" required>Verdadero
                </label>
                <label for="respuesta2_f">
                    <input type="radio" value="falso" name="respuesta2" id="respuesta2_f" required>Falso
                </label>
            </fieldset>
            <div id="preguntas"></div>
            
            <div class="botones">
                <button class="btn" type="button" id="agregar-pregunta"><span>Agregar pregunta</span></button>
                <button class="btn" type="button" id="eliminar-pregunta"><span>Eliminar pregunta</span></button>
                <button class="btn" type="submit"><span>Enviar</span></button>
            </div>
            <input type="hidden" name="contador" id="contador">
        </form>
    </div>
    <script src="../assets/jsagregar/agregarpregunta.js"></script>
</body>

</html>