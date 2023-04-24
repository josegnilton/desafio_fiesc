@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header title-dashboard">{{ __('Criar uma tarefa') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf

                            <div class="form-group row mt-2">
                                <label for="title"
                                    class="col-md-4 col-form-label text-md-right title-dashboard">{{ __('Título') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-2">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right title-dashboard">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required
                                        autocomplete="description">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pt-2">
                                <label for="type"
                                    class="col-md-4 col-form-label text-md-right title-dashboard">{{ __('Tipo') }}</label>

                                <div class="col-md-6">
                                    <select id="type" class="form-control @error('type') is-invalid @enderror"
                                        name="type" required>
                                        <option value="" selected disabled>{{ __('Selecione um tipo') }}</option>
                                        <option value="Incidente">{{ __('Incidente') }}</option>
                                        <option value="Solicitação de Serviço">{{ __('Solicitação de Serviço') }}</option>
                                        <option value="Melhoria">{{ __('Melhoria') }}</option>
                                        <option value="Projetos">{{ __('Projetos') }}</option>
                                    </select>

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row pt-2">
                                <label for="priority"
                                    class="col-md-4 col-form-label text-md-right title-dashboard">{{ __('Prioridade') }}</label>

                                <div class="col-md-6">
                                    <select id="priority" class="form-control @error('priority') is-invalid @enderror"
                                        name="priority" required>
                                        <option value="" selected disabled>{{ __('Selecione a Prioridade') }}
                                        </option>
                                        <option value="Alta">{{ __('Alta') }}</option>
                                        <option value="Média">{{ __('Média') }}</option>
                                        <option value="Baixa">{{ __('Baixa') }}</option>
                                        <option value="Sem Prioridade">{{ __('Sem Prioridade') }}</option>
                                    </select>

                                    @error('priority')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0 pt-2">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
