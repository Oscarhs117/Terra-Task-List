$(document).ready(function () {
  // Maneja el clic en enlaces de eliminación de tarea
  function setupDeleteListeners() {
    $(".delete-task")
      .off("click")
      .on("click", function (e) {
        e.preventDefault();

        // Confirmar con el usuario antes de eliminar
        if (confirm("¿Estás seguro de eliminar esta tarea?")) {
          const id = $(this).data("id");
          // Guardamos el elemento <li> que contiene la tarea
          const listItem = $(this).closest("li");
          // Verificamos si el elemento existe
          if (listItem.length === 0) {
            console.error("Elemento de tarea no encontrado.");
            return;
          }

          // Envía una petición POST para eliminar la tarea
          $.post("./delete.php", { id: id }, function (response) {
            // Recargar el div de tareas después de eliminar para evitar recargar toda la página
            $("#task-list").load("./index.php #task-list > *", function () {
            
            // Volver a configurar los listeners de eliminación después de cargar el nuevo contenido
              setupDeleteListeners();
            });
          }).fail(function () {
            // Manejo del caso en que la petición POST de eliminación falle
            alert("Error al eliminar la tarea.");
          });
        }
      });
  }
  // Inicializar los listeners de eliminación al cargar la página
  setupDeleteListeners();
});