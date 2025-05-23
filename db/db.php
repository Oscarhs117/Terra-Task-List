<?php
// Configuración de conexión a la base de datos
$host = 'localhost';
$db = 'task_db';
$user = 'root';
$pass = '';

try {
    // Inicializa una nueva instancia PDO con manejo de errores habilitado
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Finaliza la ejecución si la conexión falla, mostrando el error
    die("Error en la conexión: " . $e->getMessage());
}
?>