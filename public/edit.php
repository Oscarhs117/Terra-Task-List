<?php
// Conexión a la base de datos y carga del modelo
require_once __DIR__ . '/../db/db.php';
require_once __DIR__ . '/../src/TaskModel.php';

$model = new TaskModel($pdo);

// Manejo del formulario POST para actualizar tarea
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $name = trim($_POST['task_name'] ?? '');

    // Validación básica: ambos campos deben estar presentes
    if ($id && $name) {
        $model->updateTask($id, $name);
        header('Location: index.php');
        exit;
    }
}

// Obtención de la tarea a editar si se proporcionó un ID por GET
$task = null;
if (!empty($_GET['id'])) {
    $task = $model->getTask($_GET['id']);

    // Si la tarea no existe, se muestra un mensaje de error
    if (!$task) {
        echo "Tarea no encontrada.";
        exit;
    }
} else {
    // Redirección si no se proporcionó ID
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Tarea</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h1>Editar Tarea</h1>

    <!-- Formulario de edición con los datos actuales precargados -->
    <form action="edit.php" method="POST">
      <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">
      <input type="text" name="task_name" value="<?= htmlspecialchars($task['task_name']) ?>" required>
      <button type="submit">Guardar Cambios</button>
    </form>

    <!-- Enlace de regreso al listado -->
    <p><a href="index.php">← Volver</a></p>
  </div>

  <!-- Script para mantener tema oscuro si fue seleccionado -->
  <script>
  function toggleTheme() {
    document.body.classList.toggle('dark');
    localStorage.setItem('theme', document.body.classList.contains('dark') ? 'dark' : 'light');
  }

  window.onload = function () {
    if (localStorage.getItem('theme') === 'dark') {
      document.body.classList.add('dark');
    }
  };
  </script>
</body>
</html>
