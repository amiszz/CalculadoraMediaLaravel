<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Nota;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        $turmas = Turma::all();

        $notas = [];

        if ($request->turma_id) {

            $notas = Nota::with('aluno.turma')

                ->whereHas('aluno', function($query) use ($request) {

                    $query->where('turma_id', $request->turma_id);

                })

                ->get();

        }

        return view('relatorio.index_relatorio', compact('turmas', 'notas'));
    }
}