<?php
// Carga la configuración de la base de datos y el modelo de tareas
require_once __DIR__ . '/../db/db.php';
require_once __DIR__ . '/../src/TaskModel.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Tareas</title>
  <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
  <div class="container">
    <h1>Lista de Tareas</h1>

    <!-- Botón para alternar entre tema claro/oscuro -->
    <div class="theme-toggle">
      <button onclick="toggleTheme()">🌗 Cambiar Tema</button>
    </div>

    <!-- Formulario para añadir una nueva tarea -->
    <form id="task-form" action="add.php" method="POST">
      <input type="text" name="task_name" placeholder="Nueva tarea..." required>
      <button type="submit">Añadir</button>
    </form>

    <!-- Lista de tareas existentes -->
    <ul class="task-list" id="task-list">  
      <?php 
        // Instancia el modelo y obtiene todas las tareas
        $model = new TaskModel($pdo);
        $tasks = $model->getAllTasks();
        foreach ($tasks as $task): 
      ?>
      <li>
        <?= htmlspecialchars($task['task_name']) ?>
        <span class="actions">
          <a href="edit.php?id=<?= $task['id'] ?>">Editar</a>
          <a href="#" class="delete-task" data-id="<?= $task['id']?>">Eliminar</a>
        </span>
      </li>
        <?php endforeach; ?>
      </ul>
  </div>

  <!-- Scripts para modo oscuro/claro -->
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

  <!-- Importación de jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Script principal -->
  <script src="./js/main.js"></script>
</body>
</html>
