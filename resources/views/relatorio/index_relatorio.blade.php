@extends('telas.app')

@section('content')

<h2 class="fw-bold mb-4">

    Relatório de Turmas

</h2>

<div class="card border-0 shadow-sm rounded-4 p-4 mb-4">

    <form method="GET"
          action="{{ route('relatorios.index') }}">

        <div class="row align-items-end">

            <div class="col-md-4">

                <label class="form-label">
                    Selecionar Turma
                </label>

                <select name="turma_id"
                        class="form-select"
                        required>

                    <option value="">
                        Selecione
                    </option>

                    @foreach($turmas as $turma)

                        <option value="{{ $turma->id }}"

                            {{ request('turma_id') == $turma->id ? 'selected' : '' }}>

                            {{ $turma->nome }}
                            -
                            {{ $turma->serie }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-2">

                <button type="submit"
                        class="btn btn-dark w-100">

                    Gerar

                </button>

            </div>

        </div>

    </form>

</div>

@if(count($notas) > 0)

<div class="card border-0 shadow-sm rounded-4 p-4">

    <table class="table table-hover align-middle">

        <thead class="table-light">

            <tr>

                <th>Aluno</th>

                <th>Média</th>

                <th>Conceito</th>

                <th>Recuperação</th>

                <th>Resultado Final</th>

            </tr>

        </thead>

        <tbody>

            @foreach($notas as $nota)

                <tr>

                    <td>

                        {{ $nota->aluno->nome }}

                    </td>

                    <td>

                        {{ number_format($nota->media, 1) }}

                    </td>

                    <td>

                        @if($nota->conceito == 'A')

                            <span class="badge bg-success">
                                A
                            </span>

                        @elseif($nota->conceito == 'B')

                            <span class="badge bg-primary">
                                B
                            </span>

                        @elseif($nota->conceito == 'C')

                            <span class="badge bg-warning text-dark">
                                C
                            </span>

                        @else

                            <span class="badge bg-danger">
                                D
                            </span>

                        @endif

                    </td>

                    <td>

                        @if($nota->recuperacao)

                            {{ $nota->recuperacao }}

                        @else

                            -

                        @endif

                    </td>

                    <td>

                        @if($nota->resultado_final)

                            {{ $nota->resultado_final }}

                        @else

                            {{ $nota->mensagem }}

                        @endif

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endif

@endsection