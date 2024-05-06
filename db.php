<?php
$conexion=mysqli_connect("localhost","root","","tiendas");

if (!$conexion) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

// Ejemplo de consulta
$query = "SELECT * FROM usuario";
$resultado = mysqli_query($conexion, $query);

// Procesar resultados (por ejemplo, imprimirlos)
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "Nombre: " . $fila['nombre'] . "<br>";
    echo "Email: " . $fila['email'] . "<br>";
    // ... y así sucesivamente
}

// Liberar resultado
mysqli_free_result($resultado);

// Cerrar conexión
mysqli_close($conexion);
?>
