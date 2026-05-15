@extends('telas.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h2>Turmas</h2>

    <a href="{{ route('turmas.create') }}"
       class="btn btn-success">
        Nova Turma
    </a>

</div>

<div class="card border-0 shadow-sm rounded-4 p-4">

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ano</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @foreach($turmas as $turma)

                <tr>
                    <td>{{ $turma->id }}</td>
                    <td>{{ $turma->nome }}</td>
                    <td>{{ $turma->ano }}</td>

                    <td>
                        @if($turma->fechada)
                            Fechada
                        @else
                            Aberta
                        @endif
                    </td>
                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection