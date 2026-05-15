@extends('telas.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h2>Notas</h2>

    <a href="{{ route('notas.create') }}"
       class="btn btn-success">

        Lançar Notas

    </a>

</div>

<div class="card border-0 shadow-sm rounded-4 p-4">

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>Aluno</th>

                <th>Média</th>

                <th>Conceito</th>

                <th>Resultado</th>

                <th>Recuperação</th>

            </tr>

        </thead>

        <tbody>

            @forelse($notas as $nota)

                <tr>

                    <td>
                        {{ $nota->aluno->nome }}
                    </td>

                    <td>
                        {{ number_format($nota->media, 1) }}
                    </td>

                    <td>
                        {{ $nota->conceito }}
                    </td>

                    <td>
                        @if($nota->resultado_final)
                            {{ $nota->resultado_final }}
                            @else
                            {{ $nota->mensagem }}
                            @endif
                    </td>

                    <td>
                        @if($nota->conceito == 'C' && !$nota->resultado_final)
                        <a href="{{ route('notas.edit', $nota->id) }}"
                        class="btn btn-warning btn-sm">
                        Recuperação
                        </a>
                        @else
                        -
                        @endif
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4"
                        class="text-center">

                        Nenhuma nota cadastrada

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection