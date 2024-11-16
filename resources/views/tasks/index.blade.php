<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace de Bootstrap (si estás usando Bootstrap para el diseño) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Lista de Tareas</h2>

        <!-- Formulario para agregar tareas -->
        <form id="task-form">
            @csrf
            <div class="form-group">
                <label for="name">Nueva Tarea</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Tarea</button>
        </form>

        <!-- Lista de tareas (usa un bucle para mostrar las tareas desde el controlador) -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Tarea</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Script de jQuery y el script AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#task-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('tasks.store') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        location.reload();  // recargar la página o actualizar la lista dinámicamente
                    },
                    error: function(response) {
                        alert('Error al agregar tarea');
                    }
                });
            });
        });
    </script>
</body>
</html>