<?php
// Iniciamos el array de correos (en el primer paso)
$mails = [
    "Juan"  =>"juan@educantabria.es",
    "Pablo" =>"pablo@gmail.com",   
    "Elena" =>"elena@yahoo.es",
    "Pete"  =>"pete@gmail.com",
    "Tania" =>"tania@gmail.com",
    "Alexey"=>"alexey@gmail.com"
];

/*
    $serializado = serialize($mails);
    echo "Serialized: " . $serializado . "\n";
    # Almacenamos en una variable
    # Luego, podemos enviar o almacenar esta cadena
    # Deserializamos el array
    $arrayDeserializado = unserialize($serializado);
    print_r($arrayDeserializado);
*/

// Si el array se envía por POST, lo restauramos
if (isset($_POST['mails'])) {
    $mails = unserialize($_POST['mails']);
}

// Función para mostrar la tabla con colores alternos
function mostrarTabla($mails) {
    echo "<table border='1' cellpadding='5' style='border-collapse: collapse;'>";
    echo "<tr><th>Nombre</th><th>Correo</th></tr>";
    $i = 0;
    foreach ($mails as $nombre => $correo) {
        // Alternamos colores en filas pares e impares
        $color = $i % 2 == 0 ? "#D3D3D3" : "#A9A9A9";
        echo "<tr style='background-color: $color;'><td>$nombre</td><td>$correo</td></tr>";
        $i++;
    }
    echo "</table>";
}

// Función para buscar un correo por nombre
function verCorreo($nombre, $mails) {
    if (array_key_exists($nombre, $mails)) {
        return "El correo de $nombre es: " . $mails[$nombre];
    } else {
        return "Error: No se encontró el nombre $nombre.";
    }
}

// Función para añadir un nuevo alumno y correo
function añadirCorreo($nombre, $correo, &$mails) {
    if (array_key_exists($nombre, $mails)) {
        return "Error: El nombre $nombre ya existe.";
    } else {
        $mails[$nombre] = $correo;
        return "El correo de $nombre ha sido añadido correctamente.";
    }
}

// Procesamos el formulario
$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ver_correo'])) {
        // Ver correo
        $nombre = trim($_POST['nombre']);
        $mensaje = verCorreo($nombre, $mails);
    } elseif (isset($_POST['añadir'])) {
        // Añadir nuevo correo
        $nombre = trim($_POST['nombre']);
        $correo = trim($_POST['nuevo_correo']);
        $mensaje = añadirCorreo($nombre, $correo, $mails);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correos de Alumnos</title>
</head>
<body>

<?php mostrarTabla($mails); ?>

<h2>Agenda: Nombres y correos</h2>
<form method="POST"  action="correos.php">
    <span>Introduce un Nombre:</span>
    <input type="text" id="nombre" name="nombre" required>
    <br><br>
    <span>Introduce un Correo:</span>
    <input type="email" id="nuevo_correo" name="nuevo_correo">
    <br><br>
    <input type="submit" name="ver_correo" value="Ver el Correo">
    <input type="submit" name="añadir" value="Añadir">
    <!-- Enviamos el array serializado para mantener los datos -->
    <input type="hidden" name="mails" value="<?php echo htmlspecialchars(serialize($mails)); ?>">
</form>

<!-- Mensaje de resultado de las acciones -->
<?php if (!empty($mensaje)): ?>
    <p><strong><?php echo $mensaje; ?></strong></p>
<?php endif; ?>

</body>
</html>