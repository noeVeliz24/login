<?php
session_start();

$usuario = $_POST['usuario'];
$contraseña = $_POST['contra'];
$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "tiendas");

if ($conexion) {
    $consulta = "SELECT id_admi, id_cadmi FROM usuario WHERE usuarios=? AND contra=?";
    $stmt = mysqli_prepare($conexion, $consulta);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $usuario, $contraseña);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_admi, $id_cadmi);
        mysqli_stmt_fetch($stmt);

        if ($id_admi == 1) {
            header("location: admin.php");
        } elseif ($id_cadmi == 2) {
            header("location: cliente.php");
        } else {
            include("index.html");
            echo "<h1 class='bad'>ERROR EN LA AUTENTIFICACION</h1>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la consulta";
    }

    mysqli_close($conexion);
} else {
    echo "Error en la conexión a la base de datos";
}
?>
