-- Crea la base de datos solo si no existe
CREATE DATABASE IF NOT EXISTS task_db;

-- Selecciona la base de datos para usar
USE task_db;

-- Crea la tabla 'tasks' si no existe, con columnas para ID, nombre y fecha de creación
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,           -- Identificador único autoincremental
    task_name VARCHAR(255) NOT NULL,             -- Nombre de la tarea, obligatorio
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Marca de tiempo automática al crear
);