<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::with('turma')->get();

        return view('alunos.lista_alunos', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $turmas = Turma::where('fechada', false)->get();

        return view('alunos.formulario_aluno', compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $turma = Turma::find($request->turma_id);
        if ($turma->fechada) {
        return back()
            ->with('erro', 'Não é possível cadastrar alunos em turma fechada.');
    }
        Aluno::create([

            'nome' => $request->nome,

            'matricula' => $request->matricula,

            'turma_id' => $request->turma_id

        ]);

        return redirect()
                ->route('alunos.index')
                ->with('sucesso', 'Aluno cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluno $aluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        //
    }
}
