@extends('telas.app')

@section('content')

<div class="card border-0 shadow-sm rounded-4 p-4">

    <h2 class="mb-4">
        Cadastro de Aluno
    </h2>

    <form action="{{ route('alunos.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Nome
            </label>

            <input type="text"
                   name="nome"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Matrícula
            </label>

            <input type="text"
                   name="matricula"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Turma
            </label>

            <select name="turma_id"
                    class="form-select"
                    required>

                <option value="">
                    Selecione
                </option>

                @foreach($turmas as $turma)

                    <option value="{{ $turma->id }}">

                        {{ $turma->nome }}
                        -
                        {{ $turma->serie }}

                    </option>

                @endforeach

            </select>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Salvar Aluno

        </button>

    </form>

</div>

@endsection