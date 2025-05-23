<?php
// Carga la configuración de la base de datos y el modelo de tareas
require_once __DIR__ . '/../db/db.php';
require_once __DIR__ . '/../src/TaskModel.php';

// Valida que la petición sea POST y que el campo 'task_name' no esté vacío
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['task_name'])) {
    $model = new TaskModel($pdo);
    // Inserta la nueva tarea después de limpiar espacios en blanco
    $model->addTask(trim($_POST['task_name']));
}

// Redirige de vuelta a la página principal después de procesar el formulario
header('Location: index.php');
exit;
