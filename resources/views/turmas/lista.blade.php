@extends('telas.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Turmas</h2>

    <a href="{{ route('turmas.create') }}"
       class="btn btn-success">

        Nova Turma

    </a>

</div>

<div class="card border-0 shadow-sm rounded-4 p-4">

    <table class="table table-bordered table-hover">

        <thead class="table-light">

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Série</th>
                <th>Status</th>
                <th>Fechar turma</th>
            </tr>

        </thead>

        <tbody>

            @forelse($turmas as $turma)

                <tr>

                    <td>{{ $turma->id }}</td>

                    <td>{{ $turma->nome }}</td>

                    <td>{{ $turma->serie }}</td>

                    <td>

                        @if($turma->fechada)

                            <span class="badge bg-danger">
                                Fechada
                            </span>

                        @else

                            <span class="badge bg-success">
                                Aberta
                            </span>

                        @endif

                    </td>

                    <td>
                        @if(!$turma->fechada)
                        <form action="{{ route('turmas.update', $turma->id) }}"method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                                class="btn btn-danger btn-sm">
                            Fechar Turma
                        </button>
                        </form>
                        @else
                        <span class="text-muted">
                        Encerrada
                        </span>
                        @endif
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4"
                        class="text-center">

                        Nenhuma turma cadastrada

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection