<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Material;
use Session;

class MaterialController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $materials = Material::all();

        return view('pages.material.index')->with([
            'materials' => $materials,
        ]);
    }

    public function create() {
        return view('pages.material.create');
    }

    public function save(Request $request) {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'required|string|max:255',
        ]);

        if($request->id == null) {
            $material = new Material;

            $material->name = $request->nome;
            $material->description = $request->descricao;

            $material->save();

            $request->session()->flash('success_new', 'Registro criado com sucesso');

            return redirect()->route('material.home');
        } else {
            $material = Material::where('id', $request->id)->first();

            $material->name = $request->nome;
            $material->description = $request->descricao;

            $material->save();

            $request->session()->flash('success_edit', 'Registro alterado com sucesso');

            return redirect()->route('material.home');
        }
    }

    public function edit($id) {
        $material = Material::where('id', $id)->first();

        return view('pages.material.edit')->with([
            'material' => $material,
        ]);
    }

    public function delete(Request $request) {
        $material = Material::where('id', $request->id)->delete();

        $materials = Material::all();

        return view('pages.material.table_ajax')->with([
            'materials' => $materials,
        ]);
    }
}
