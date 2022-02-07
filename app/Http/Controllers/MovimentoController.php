<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fin_movimento;

class MovimentoController extends Controller
{
    public function store(Request $request)
    {
        $movimento = new Fin_movimento;

        $movimento->valor = $request->valor;
        $movimento->descricao  = $request->descricao;
        $movimento->tipo = $request->tipo;
        $movimento->data = date('Y-m-d');

        $user = auth()->user();
        $movimento->user_id= $user->id;

        $movimento->save();
        return redirect('dashboard');
    }

    public function getMovimentos()
    {
        $user = auth()->user();
        $despesas = Fin_movimento::where('tipo', 'Despesa')->where('user_id', $user->id)->get();
        $receitas = Fin_movimento::where('tipo', 'Receita')->where('user_id', $user->id)->get();

        $totaldespesas = $despesas->sum('valor');
        $totalreceitas = $receitas->sum('valor');

        $parametros = [
            'despesas'=> $despesas, 
            'receitas'=>$receitas, 
            'totaldespesas'=>$totaldespesas, 
            'totalreceitas'=>$totalreceitas
        ];

        return view('dashboard', $parametros);
    }

    public function editar($id)
    {
        $movimento = Fin_movimento::findOrFail($id);
        return view ('editar', ['movimento' => $movimento]);
    }

    public function updatemovimento(Request $request)
    {
        Fin_movimento::findOrFail($request->id)->update($request->all());
	    return redirect('/dashboard');
    }
}
