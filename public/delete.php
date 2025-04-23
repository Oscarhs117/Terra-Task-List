<?php
// Carga la configuración de la base de datos y el modelo de tareas
require_once __DIR__ . '/../db/db.php';
require_once __DIR__ . '/../src/TaskModel.php';

// Verifica que la petición sea POST y que se haya enviado un ID válido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $model = new TaskModel($pdo);
    // Elimina la tarea con el ID proporcionado
    $model->deleteTask($_POST['id']);
}