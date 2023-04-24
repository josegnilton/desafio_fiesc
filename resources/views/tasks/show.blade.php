@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title-dashboard text-center">Detalhes da Tarefa {{ $task->id }}</h1>
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-start font-weight-bold"><span class="title-dashboard">Título da tarefa:</span>
                    {{ $task->title }}
                </h2>
                <h4><span class="title-dashboard">Responsável pela tarefa:</span> {{ $task->user->name }}</h4>
            </div>
            <div class="col-md-6 text-lg-end">
                @if ($task->user_id != Auth::id())
                    <form action="{{ route('tasks.assume', ['task' => $task]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary mt-2">Assumir tarefa</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                {{ $task->description }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type"><span class="title-dashboard">Tipo:</span> {{ $task->type }}</label>
                </div>
                <div class="form-group">
                    <label for="priority"><span class="title-dashboard">Prioridade:</span> {{ $task->priority }}</label>
                </div>

                <div class="form-group">
                    <label for="status"><span class="title-dashboard">Status:</span> {{ $task->status }}</label>
                </div>
            </div>

            <div class="col-md-6">
                @if (count($task->observations) > 0)
                    <div class="form-group">
                        <label for="observations" class="title-dashboard">Observações</label>
                        <ul class="list-group">
                            @foreach ($task->observations as $index => $observation)
                                <li class="list-group-item">
                                    {{ $observation->text }} - Criado em:
                                    {{ $observation->created_at->format('d/m/Y H:i:s') }} - Por:
                                    {{ $observation->user->name }}
                                    @if ($index === count($task->observations) - 1 && $observation->user_id == Auth::id())
                                        <button type="button" class="btn btn-sm btn-warning ml-2" data-toggle="modal"
                                            data-target="#editObservationModal-{{ $observation->id }}-{{ $index }}">Editar</button>
                                    @endif

                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="alert alert-info">
                        Não há observações. Clique no botão abaixo para criar uma nova observação.
                    </div>
                @endif
                @if ($task->user_id == Auth::id())
                    <form method="post" action="{{ route('tasks.addObservation', $task->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="observation">Nova observação:</label>
                            <textarea class="form-control" id="observation" name="observation" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Adicionar observação</button>
                    </form>
                @else
                    <form method="post" action="{{ route('tasks.addObservation', $task->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="observation">Nova observação:</label>
                            <textarea class="form-control" id="observation" name="observation" rows="3" disabled></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2" disabled>Adicionar observação</button>
                    </form>
                @endif
            </div>
        </div>

        <div class="d-flex text-start">
            <form method="GET" action="{{ route('tasks.index') }}">
                @csrf
                <button type="submit" class="btn btn-secondary mx-1">Voltar</button>
            </form>
            @if ($task->user_id == Auth::id())
                <form method="GET" action="{{ route('tasks.edit', $task->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-warning mx-1">Editar</button>
                </form>
                @if ($task->status == 'em andamento')
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#finalizarTarefaModal">
                        Finalizar Tarefa
                    </button>
                @endif
            @endif
        </div>
    </div>
@endsection

@foreach ($task->observations as $index => $observation)
    <div class="modal fade" id="editObservationModal-{{ $observation->id }}-{{ $index }}" tabindex="-1"
        role="dialog" aria-labelledby="editObservationModalLabel-{{ $observation->id }}-{{ $index }}"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Observação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('tasks.updateObservation', [$task->id, $observation->id]) }}" method="POST"
                    id="editObservationForm-{{ $observation->id }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="observation-text-{{ $observation->id }}"
                                class="col-form-label">Observação:</label>
                            <textarea class="form-control" id="observation-text-{{ $observation->id }}" name="text" rows="3">{{ $observation->text }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<div class="modal fade" id="finalizarTarefaModal" tabindex="-1" role="dialog"
    aria-labelledby="finalizarTarefaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="finalizarTarefaModalLabel">Finalizar Tarefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('tasks.finalize', $task->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="motivo">Motivo da Finalização</label>
                        <textarea class="form-control" id="motivo" name="motivo" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Finalizar Tarefa</button>
                </div>
            </form>
        </div>
    </div>
</div>
