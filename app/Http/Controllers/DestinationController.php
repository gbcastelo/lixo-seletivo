<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Destination;

class DestinationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        return view('pages.destination.index');
    }

    public function create() {
        return view('pages.destination.create');
    }

    public function save(Request $request) {
        $destino = new Destination;

        $destino->name = $request->nome;
        $destino->description = $request->descricao;
        $destino->finality = $request->finalidade;

        $destino->save();

        return redirect()->back()->with('success', 'Destino salvo com sucesso!');
    }
}
