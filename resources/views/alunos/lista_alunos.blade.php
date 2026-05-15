@extends('telas.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Alunos</h2>

    <a href="{{ route('alunos.create') }}"
       class="btn btn-success">

        Novo Aluno

    </a>

</div>

<div class="card border-0 shadow-sm rounded-4 p-4">

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Turma</th>
            </tr>

        </thead>

        <tbody>

            @forelse($alunos as $aluno)

                <tr>

                    <td>{{ $aluno->id }}</td>

                    <td>{{ $aluno->nome }}</td>

                    <td>{{ $aluno->matricula }}</td>

                    <td>

                        {{ $aluno->turma->nome }}
                        -
                        {{ $aluno->turma->serie }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4"
                        class="text-center">

                        Nenhum aluno cadastrado

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection