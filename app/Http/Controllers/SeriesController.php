<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use Illuminate\Http\Request;
use App\Models\Series;

class SeriesController extends Controller
{
    public function index(Request $req){        
        $series = Series::all();
        $mensagemSucesso = $req->session()->get('mensagem.sucesso');
        return view('series.index')
        ->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function capturaParametro(Request $req){
        echo $req->query('nome');
        echo $req->query('sobreNome');

    }

    public function create(){
        return view('series.create');
    }

    public function store(SeriesFormRequest $req){        
        #$serie = new Serie;
        #$serie->nome =$req->input('nome'); 
        #$serie->save();
       
        $nomeSerie =  $req->input('nome');     
        $serie = Series::create($req->all());

        for($i=1; $i < $req->seasonsQty; $i++){
            $season = $serie->seasons()->create([
                'numero'=>$i,
            ]); 

            for($j=1; $j < $req->episodesPerSeason; $j++){
                $season->episodes()->create([
                    'numero'=>$j,
                ]);
            }
        }
       
        return to_route('series.index')->with('mensagem.sucesso', 
        "Serie $nomeSerie inserida com sucesso");     
    }

    public function destroy(Request $req){
        $id = $req->serie;
        $serie = Series::find($id);
        $nomeSerie = $serie->nome;
        $serie->delete();
        return to_route('series.index')->with('mensagem.sucesso', 
        "Serie $nomeSerie removida com sucesso");
    }

    public function edit(Request $req){
        $id = $req->serie;
        $serie = Series::find($id);
        return view('series.edit')->with('serie', $serie);
    }

    public function update(SeriesFormRequest $req){
        $id = $req->input('id');     
        $serie = Series::find($id);
        $serie->nome = $req->input('nome');        
        $serie->update();
        return to_route('series.index')->with('mensagem.sucesso', 
        "Serie $serie->nome atualizada com sucesso");
    }
}
