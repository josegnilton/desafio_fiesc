@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tarefas</h1>

        @if ($successMessage)
            <div class="alert alert-success">{{ $successMessage }}</div>
        @endif

        @if ($tasks)
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-gray">
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Tipo</th>
                            <th>Prioridade</th>
                            <th>Criado por</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="{{ $task->user_id == Auth::id() ? 'orange-border' : '' }}">
                                <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->id }}</a></td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->type }}</td>
                                <td>{{ $task->priority }}</td>
                                <td>{{ $task->user->name }}</td>
                                <td>{{ $task->created_at }}</td>
                                <td>
                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                    @if ($task->user_id == Auth::id())
                                        <a href="{{ route('tasks.edit', $task->id) }}"
                                            class="btn btn-warning btn-sm">Editar</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $tasks->links(null, ['class' => 'my-pagination']) }}
            
        @else
            <div class="alert alert-info" role="alert">
                Ainda não existe nenhuma tarefa cadastrada.
            </div>
        @endif

        <a href="{{ route('tasks.create') }}" class="btn btn-success">Crie uma nova tarefa</a>
    </div>
@endsection
