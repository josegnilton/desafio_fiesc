@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Tarefa</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" class="title-dashboard pt-1">Título</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
            </div>

            <div class="form-group">
                <label for="description" class="title-dashboard pt-1">Descrição</label>
                <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="type" class="title-dashboard pt-1" >Tipo</label>
                <select class="form-control" id="type" name="type">
                    <option value="" selected disabled>{{ __('Selecione um tipo') }}</option>
                    <option value="Incidente">{{ __('Incidente') }}</option>
                    <option value="Solicitação de Serviço">{{ __('Solicitação de Serviço') }}</option>
                    <option value="Melhoria">{{ __('Melhoria') }}</option>
                    <option value="Projetos">{{ __('Projetos') }}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="priority" class="title-dashboard pt-1">Prioridade</label>
                <select class="form-control" id="priority" name="priority">
                    <option value="" selected disabled>{{ __('Selecione a Prioridade') }}</option>
                    <option value="Alta">{{ __('Alta') }}</option>
                    <option value="Média">{{ __('Média') }}</option>
                    <option value="Baixa">{{ __('Baixa') }}</option>
                    <option value="Sem Prioridade">{{ __('Sem Prioridade') }}</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
        </form>
    </div>
@endsection
