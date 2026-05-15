@extends('telas.app')

@section('content')

<div class="card border-0 shadow-sm rounded-4 p-4">

    <h2 class="mb-4">
        Cadastro de Turma
    </h2>

    <form action="{{ route('turmas.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Nome da Turma
            </label>

            <input type="text"
                   name="nome"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Série
            </label>

            <input type="text"
                   name="serie"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-success">

            Salvar Turma

        </button>

    </form>

</div>

@endsection