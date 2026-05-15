@extends('telas.app')

@section('content')

<div class="card border-0 shadow-sm rounded-4 p-4">

    <h2 class="mb-4">
        Lançamento de Notas
    </h2>

    <form action="{{ route('notas.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Aluno
            </label>

            <select name="aluno_id"
                    class="form-select"
                    required>

                <option value="">
                    Selecione
                </option>

                @foreach($alunos as $aluno)

                    <option value="{{ $aluno->id }}">

                        {{ $aluno->nome }}
                        -
                        {{ $aluno->turma->nome }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="row">

            <div class="col-md-3 mb-3">

                <label class="form-label">
                    Nota 1
                </label>

                <input type="number"
                       step="0.1"
                       name="nota1"
                       class="form-control"
                       required>

            </div>

            <div class="col-md-3 mb-3">

                <label class="form-label">
                    Nota 2
                </label>

                <input type="number"
                       step="0.1"
                       name="nota2"
                       class="form-control"
                       required>

            </div>

            <div class="col-md-3 mb-3">

                <label class="form-label">
                    Nota 3
                </label>

                <input type="number"
                       step="0.1"
                       name="nota3"
                       class="form-control"
                       required>

            </div>

            <div class="col-md-3 mb-3">

                <label class="form-label">
                    Nota 4
                </label>

                <input type="number"
                       step="0.1"
                       name="nota4"
                       class="form-control"
                       required>

            </div>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Calcular Média

        </button>

    </form>

</div>

@endsection