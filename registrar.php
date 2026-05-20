<?php
// Configuración de la conexión
$servidor = "localhost";
$usuario  = "root";     // Usuario por defecto en XAMPP
$password = "";         // Contraseña por defecto en XAMPP (vacío)
$base_datos = "portafolio_db";

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $comentarios = $_POST['comentarios'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO visitantes (nombre, correo, comentarios) 
            VALUES ('$nombre', '$correo', '$comentarios')";

    if ($conexion->query($sql) === TRUE) {
        echo "<script>
                alert('¡Registro exitoso! Gracias por tu comentario.');
                window.location.href='index.html'; 
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

$conexion->close();
?>