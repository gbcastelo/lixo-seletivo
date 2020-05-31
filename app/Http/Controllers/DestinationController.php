<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Destination;
use Session;

class DestinationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $destinations = Destination::all();

        return view('pages.destination.index')->with([
            'destinations' => $destinations,
        ]);
    }

    public function create() {
        return view('pages.destination.create');
    }

    public function save(Request $request) {
        
        $validatedData = $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'required|string|max:255',
            'finalidade' => 'required|string|max:100'
        ]);

        if ($request->id == null) {
            $destination = new Destination;
    
            $destination->name = $request->nome;
            $destination->description = $request->descricao;
            $destination->finality = $request->finalidade;
            
            $destination->save();

            $request->session()->flash('success_new', 'Registro criado com sucesso!');
            
            return redirect()->route('destination.home');

        } else {
            $destination = Destination::where('id', $request->id)->first();

            $destination->name = $request->nome;
            $destination->description = $request->descricao;
            $destination->finality = $request->finalidade;
            
            $destination->save();

            $request->session()->flash('success_edit', 'Registro alterado com sucesso!');

            return redirect()->route('destination.home');

        }
    }

    public function edit($id) {
        $destination = Destination::where('id', $id)->first();

        return view('pages.destination.edit')->with([
            'destination' => $destination,
        ]);
    }

    public function delete(Request $request) {
        $destination = Destination::where('id', $request->id)->delete();

        $destinations = Destination::all();

        return view('pages.destination.table_ajax')->with([
            'destinations' => $destinations
        ]);
    }
}
