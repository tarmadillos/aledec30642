@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Tareas</h2>

    <!-- Formulario para añadir tarea -->
    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="form-group">
            <label for="taskName">Nueva Tarea</label>
            <input type="text" name="name" id="taskName" class="form-control" placeholder="Ingrese una tarea" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

    <!-- Lista de tareas -->
    <table class="table">
        <thead>
            <tr>
                <th>Tarea</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection