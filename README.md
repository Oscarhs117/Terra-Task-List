#  Task List - CRUD en PHP + MySQL

Una aplicación web de lista de tareas que permite crear, visualizar, editar y eliminar tareas de forma simple e intuitiva. Desarrollada con **PHP (PDO)**, **MySQL**, y un **frontend responsivo** con **Flexbox**, **modo oscuro/claro** y soporte AJAX para mejor experiencia de usuario.

---

##  Tabla de Contenidos

- [Características](#características)
- [Tecnologías](#tecnologías)
- [Instalación local](#-instalación-local)
- [Estructura del proyecto](#estructura-del-proyecto)

---

##  Características

- [x] Crear nuevas tareas
- [x] Listar tareas ordenadas por fecha de creación
- [x] Editar tareas existentes
- [x] Eliminar tareas (usando AJAX)
- [x] Interfaz responsiva y mobile-first
- [x] Modo claro / oscuro con persistencia en localStorage

---

##  Tecnologías

- **PHP 8+** — backend y lógica
- **MySQL 5.7+ / MariaDB** — base de datos relacional
- **HTML5 + CSS3** — estructura y estilo
- **Flexbox + Media Queries** — diseño responsivo
- **JavaScript (jQuery)** — interacción y AJAX
- **Git** — control de versiones

---

##  Instalación local

### 1. Clona el repositorio

```bash
git clone https://github.com/Oscarhs117/Terra-Task-List.git
cd Terra-Task-List
```

### 2. Crea la base de datos

Tienes dos opciones:

#### Opción A: Usando phpMyAdmin

Accede a http://localhost/phpmyadmin

Crea una base de datos llamada task_db

Importa el archivo tasks.sql incluido en el proyecto

#### Opción B: Usando línea de comandos (recomendado para devs)

Desde la terminal o CMD, estando en la raíz del proyecto:

```bash
mysql -u root < tasks.sql
```

 Nota: Si tu usuario root de MySQL tiene contraseña, agrega -p:

 
```bash
mysql -u root -p < tasks.sql
```

### 3. Configura la conexión en db/db.php

### 4. Abre la aplicación

Visita en tu navegador:

http://localhost/Terra-Task-List/public/index.php

---

##  Estructura del proyecto
```bash
Terra-Task-List/
├── db/
│   └── db.php
├── public/
│   ├── css/style.css
│   ├── js/main.js
│   ├── index.php
│   ├── add.php
│   ├── edit.php
│   └── delete.php
├── src/
│   └── TaskModel.php
├── tasks.sql
└── README.md
```
---

##  Autor

Desarrollado por Oscar Hernandez Salinas 

Contacto: hsoscar@yahoo.com.mx | GitHub: Oscarhs117