<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Aluno;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notas = Nota::with('aluno.turma')->get();

        return view('notas.lista_notas', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alunos = Aluno::with('turma')->get();

        return view('notas.formulario_notas', compact('alunos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aluno = Aluno::with('turma')
                    ->find($request->aluno_id);
        if ($aluno->turma->fechada) {
            return back()
                    ->with('erro', 'Turma encerrada. Não é possível lançar notas.');
        }

        $media = (

        $request->nota1 +

        $request->nota2 +

        $request->nota3 +

        $request->nota4

    ) / 4;

    if ($media >= 9) {

        $conceito = 'A';

        $mensagem = 'Aprovado com Louvor!';

    }

    elseif ($media >= 7) {

        $conceito = 'B';

        $mensagem = 'Aluno Aprovado!';

    }

    elseif ($media >= 4) {

        $conceito = 'C';

        $mensagem = 'Recuperação, sua chance de passar.';

    }

    else {

        $conceito = 'D';

        $mensagem = 'Poxa vida, vamos tentar novamente ano que vem...';

    }

    Nota::create([

        'aluno_id' => $request->aluno_id,

        'nota1' => $request->nota1,

        'nota2' => $request->nota2,

        'nota3' => $request->nota3,

        'nota4' => $request->nota4,

        'media' => $media,

        'conceito' => $conceito,

        'mensagem' => $mensagem

    ]);

    return redirect()
            ->route('notas.index')
            ->with('sucesso', 'Notas cadastradas com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nota $nota)
    {
        return view('notas.recuperacao_notas', compact('nota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nota $nota)
    {
         $final = $nota->media + $request->recuperacao;

    if ($final >= 10) {

        $resultado = 'Aprovado após recuperação';

    } else {

        $resultado = 'Reprovado após recuperação';

    }

    $nota->update([

        'recuperacao' => $request->recuperacao,

        'resultado_final' => $resultado

    ]);

    return redirect()
            ->route('notas.index')
            ->with('sucesso', 'Recuperação lançada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
