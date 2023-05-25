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

$sql = "SELECT id,nombre FROM formulario";
$result = $conect->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Listado de formularios</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;800&display=swap');
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Nunito', sans-serif;
            font-size: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

         /* Estilos para el botón realizar*/
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
        /* titulo */
        .header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 10px 20px;
        background: linear-gradient(
                90deg,
                rgba(2, 0, 36, 1) 0%,
                rgba(75, 14, 154, 1) 35%,
                rgba(0, 212, 255, 1) 100%
            );
        }

        .menu {
            text-align: right;
        }

        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li {
            display: inline-block;
            margin-left: 10px;
        }

        .menu li:first-child {
            margin-left: 0;
            padding: 5px 20px;
        }

        .menu li:hover{
            transform: scale(1.1);
        }

        .menu a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .menu li a:hover{
            color: rgb(72, 72, 87);
        }

        .header-title {
            margin: 0;
            font-size: 24px;
            color: #fff;
        }

    </style>
</head>
<body>
<div class="header">
    <h1 class="header-title">Listado de formularios</h1>
    <div class="menu">
        <nav>
            <ul>
                <li><a href="realizarFormulario.php">Inicio</a></li>
                <li><a href="cerrar_session.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </div>
</div>

<br>
    

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre del formulario</th>
            <th>Acciones</th>
        </tr>
        <?php
        

        // Verificar si hay resultados
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                //echo "<td><a href='realizar.php?id=" . $row["id"] . "'>Realizar</a></td>";
                echo "<td><a class='boton' href='realizar.php?id=" . $row["id"] . "'>Realizar</a></td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No se encontraron formularios</td></tr>";
        }

        // Cerrar la conexión
        mysqli_close($conect);
        ?>
    </table>

</body>
</html>
</html>