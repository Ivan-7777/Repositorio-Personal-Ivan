<?php
header('Content-Type: text/html; charset=utf-8');

$host = 'mariadb';
$port = 3306;
$dbname = 'mi_basedatos';
$username = 'usuario_web';
$password = 'password123';

echo "<h3>Probando conexión a MariaDB...</h3>";
echo "Host: $host<br>";
echo "Puerto: $port<br>";
echo "Base de datos: $dbname<br>";
echo "Usuario: $username<br><br>";

$mysqli = new mysqli($host, $username, $password, $dbname, $port);

if ($mysqli->connect_error) {
    echo "<div style='color: red;'>";
    echo "❌ Error de conexión: " . $mysqli->connect_error;
    echo "</div>";
} else {
    echo "<div style='color: green;'>";
    echo "✅ ¡Conexión exitosa!";
    echo "</div>";
    
    // Crear una tabla de prueba
    $mysqli->query("CREATE TABLE IF NOT EXISTS test (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    // Insertar un dato
    $mysqli->query("INSERT INTO test (name) VALUES ('Test desde PHP')");
    
    // Contar registros
    $result = $mysqli->query("SELECT COUNT(*) as total FROM test");
    $row = $result->fetch_assoc();
    
    echo "<br>Registros en tabla 'test': " . $row['total'];
    
    $mysqli->close();
}
?>