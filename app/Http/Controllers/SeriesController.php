<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function index(Request $request) {
        //Armazena todos os dados recuperados de SerieModel ordenando por nome  
        $series = Serie::query()->orderBy('nome')->get();

        //Recupera a mensagem de sessão passado por request através do método store
        $mensagem = $request->session()->get('mensagem');

        //Remover da sessão a mensagem
        $request->session()->remove('mensagem');

        //Retorna a vire e passa como 'compact' as variáveis e arrays
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        //Validação
        //$request->validate();

        $serie = Serie::create($request->all());

        //Pegar sessão da requisição. Com o método put enviar uma mensagem como resposta
        $request->session()->flash('mensagem', "Série {$serie->id} criada com sucesso {$serie->nome}");

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);

        $request->session()->flash('mensagem', "A série foi removida com sucesso");

        //return redirect('/series');
        return redirect()->route('listar_series');
    }
}