<?php
// Importa la conexión a la base de datos
require_once __DIR__ . '/../db/db.php';

class TaskModel {
    private $pdo;

    // Inyecta la conexión PDO al instanciar el modelo
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Obtiene todas las tareas ordenadas por fecha de creación descendente
    public function getAllTasks() {
        $stmt = $this->pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Inserta una nueva tarea en la base de datos
    public function addTask($name) {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (task_name) VALUES (:name)");
        return $stmt->execute(['name' => $name]);
    }

    // Obtiene una tarea específica por su ID
    public function getTask($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualiza el nombre de una tarea existente
    public function updateTask($id, $name) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET task_name = :name WHERE id = :id");
        return $stmt->execute(['name' => $name, 'id' => $id]);
    }

    // Elimina una tarea por su ID
    public function deleteTask($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
