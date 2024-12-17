<?php
$host = "localhost";
$user = "pete";
$pass = "pete";
$db   = "examen";

// Crear conexión utilizando MySQLi LEER INSERTAR
$conexion = mysqli_connect($host, $user, $pass, $db);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Si llegamos aquí, la conexión está establecida
echo "Conexión exitosa con MySQLi <br>";

// Consulta de ejemplo: seleccionar todas las filas de una tabla
$sql = "SELECT id, email, pass FROM user";
$resultado = mysqli_query($conexion, $sql);
if ($resultado) {
  // Verificamos si hay filas devueltas
  if (mysqli_num_rows($resultado) > 0) {
      // Recorremos las filas y mostramos los datos
      while ($fila = mysqli_fetch_assoc($resultado)) {
          echo "ID: " . $fila['id'] . "<br>";
          echo "email: " . $fila['email'] . "<br>";
          echo "pass: " . $fila['pass'] . "<br>";
          echo "<hr>";
      }
  } else {
      echo "No se encontraron resultados.";
  }
} else {
  echo "Error en la consulta: " . mysqli_error($conexion);
}


// Desactivar autocommit para manejar transacciones manualmente
mysqli_autocommit($conexion, false);

$sql = "INSERT INTO user (email, pass) VALUES (?, ?)";
$stmt = mysqli_prepare($conexion, $sql);

if ($stmt) {
  $valor1 = "Ejemplo1";
  $valor2 = "Ejemplo2";
  mysqli_stmt_bind_param($stmt, 'ss', $valor1, $valor2);
  
  if (mysqli_stmt_execute($stmt)) {
      // Si la ejecución fue exitosa, hacemos commit
      mysqli_commit($conexion);
      echo "Inserción realizada con éxito";
  } else {
      // Si falla la ejecución, revertimos con rollback
      mysqli_rollback($conexion);
      echo "Error al insertar datos: " . mysqli_error($conexion);
  }
  
  mysqli_stmt_close($stmt);
} else {
  echo "Error al preparar la consulta: " . mysqli_error($conexion);
}

// Cerrar la conexión al finalizar
mysqli_close($conexion);




// PDO LEER
try {
  $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
  $opciones = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ];

  $pdo = new PDO($dsn, $user, $pass, $opciones);
  echo "Conexión exitosa con PDO <br>";

  // Ejemplo de consulta:
  $stmt = $pdo->query("SELECT * FROM user");
  $result = $stmt->fetchAll();
  var_dump($result);

} catch (PDOException $e) {
  echo "Error de conexión: " . $e->getMessage();
}

// PDO INSERTAR
try {
  $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
  $opciones = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ];

  $pdo = new PDO($dsn, $user, $pass, $opciones);

  // Iniciar la transacción
  $pdo->beginTransaction();
  
  $sql = "INSERT INTO user (email, pass) VALUES (?, ?)";
  $stmt = $pdo->prepare($sql);
  
  $valor1 = "PDO ejemplo";
  $valor2 = "PDO 2";
  
  if ($stmt->execute([$valor1, $valor2])) {
      // Si todo fue bien, confirmamos los cambios
      $pdo->commit();
      echo "Inserción realizada con éxito";
  } else {
      // Si hay un problema, revertimos
      $pdo->rollBack();
      echo "Error al insertar datos";
  }

} catch (PDOException $e) {
  // En caso de excepción, asegurarnos de hacer rollback y mostrar el error
  if ($pdo->inTransaction()) {
      $pdo->rollBack();
  }
  echo "Error: " . $e->getMessage();
}