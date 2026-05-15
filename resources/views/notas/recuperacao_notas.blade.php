@extends('telas.app')

@section('content')

<div class="card border-0 shadow-sm rounded-4 p-4">

    <h2 class="mb-4">
        Recuperação
    </h2>

    <p>

        <strong>Aluno:</strong>
        {{ $nota->aluno->nome }}

    </p>

    <p>

        <strong>Média:</strong>
        {{ number_format($nota->media, 1) }}

    </p>

    <form action="{{ route('notas.update', $nota->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Nota da Recuperação
            </label>

            <input type="number"
                   step="0.1"
                   name="recuperacao"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Finalizar Recuperação

        </button>

    </form>

</div>

@endsection