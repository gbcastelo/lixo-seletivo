<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trash;
use App\Destination;
use App\Employee;
use App\Material;

class TrashController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $trashs = Trash::with(['destination', 'employees', 'materials'])->get();

        return view('pages.trash.index')->with([
            'trashs' => $trashs,
        ]);
    }

    public function create_in() {
        $funcionarios = Employee::all();
        $materiais = Material::all();

        return view('pages.trash.create_in')->with([
            'funcionarios' => $funcionarios,
            'materiais' => $materiais,
        ]);
    }

    public function create_out() {
        $destinations = Destination::all();
        $funcionarios = Employee::all();
        $materiais = Material::all();

        return view('pages.trash.create_out')->with([
            'destinations' => $destinations,
            'funcionarios' => $funcionarios,
            'materiais' => $materiais,
        ]);
    }

    public function save(Request $request) {
        $validatedData = $request->validate([
            'data' => 'required|string',
            'hora' => 'required|string',
            'peso' => 'required|string|max:100',
            'descricao' => 'required|string|max:255'
        ]);

        if ($request->id == null) {
            $trash = new Trash;

            $trash->date = implode("-",array_reverse(explode("/",$request->data))) . ' ' . $request->hora . ':00';
            $trash->weight = $request->peso;
            $trash->description = $request->descricao;
            if ($request->destino != null) {
                $trash->destination_id = $request->destino;
            }
            $trash->type = $request->tipo;

            $trash->save();

            $trash->employees()->sync($request->funcionarios);

            $trash->materials()->sync($request->materiais);

            $request->session()->flash('success_new', 'Registro criado com sucesso');
            
            return redirect()->route('home');
        } else {
            $trash = Trash::where('id', $request->id)->first();

            $trash->date = implode("-",array_reverse(explode("/",$request->data))) . ' ' . $request->hora . ':00';
            $trash->weight = $request->peso;
            $trash->description = $request->descricao;
            if ($request->destino != null) {
                $trash->destination_id = $request->destino;
            }
            $trash->type = $request->tipo;

            $trash->save();

            $trash->employees()->sync($request->funcionarios);

            $trash->materials()->sync($request->materiais);

            $request->session()->flash('success_edit', 'Registro alterado com sucesso');

            return redirect()->route('home');
        }

    }

    public function delete(Request $request) {
        $trash = Trash::where('id', $request->id)->delete();

        $trashs = Trash::with(['destination', 'employees', 'materials'])->get();

        return view('pages.trash.table_ajax')->with([
            'trashs' => $trashs,
        ]);
    }

    public function edit_in($id) {
        $trash = Trash::with(['employees', 'materials'])->where('id', $id)->first();
        $funcionarios = Employee::all();
        $materiais = Material::all();
        $employee_un = Employee::WhereNotIn('id', $trash->employees->pluck('id'))->get();
        $material_un = Material::WhereNotIn('id', $trash->materials->pluck('id'))->get();

        return view('pages.trash.edit_in')->with([
            'trash' => $trash,
            'funcionarios' => $funcionarios,
            'materiais' => $materiais,
            'employee_un' => $employee_un,
            'material_un' => $material_un,
        ]);
    }

    public function edit_out($id) {
        $trash = Trash::with(['destination', 'employees', 'materials'])->where('id', $id)->first();
        $destinations = Destination::all();
        $funcionarios = Employee::all();
        $materiais = Material::all();
        $employee_un = Employee::WhereNotIn('id', $trash->employees->pluck('id'))->get();
        $material_un = Material::WhereNotIn('id', $trash->materials->pluck('id'))->get();

        return view('pages.trash.edit_out')->with([
            'trash' => $trash,
            'destinations' => $destinations,
            'funcionarios' => $funcionarios,
            'materiais' => $materiais,
            'employee_un' => $employee_un,
            'material_un' => $material_un,
        ]);
    }
}
