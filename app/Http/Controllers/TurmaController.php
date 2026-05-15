<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turmas = Turma::all();

        return view('turmas.lista', compact('turmas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('turmas.formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        Turma::create([

            'nome' => $request->nome,

            'serie' => $request->serie

        ]);

        return redirect()
                ->route('turmas.index')
                ->with('sucesso', 'Turma cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Turma $turma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turma $turma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Turma $turma)
    {
        $turma->update([
            'fechada' => true
        ]);
        return redirect()
                ->route('turmas.index')
                ->with('sucesso', 'Turma fechada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turma $turma)
    {
        //
    }
}
