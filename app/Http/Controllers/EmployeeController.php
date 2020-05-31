<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Employee;
use Session;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $employees = Employee::all();

        return view('pages.employee.index')->with([
            'employees' => $employees,
        ]);
    }

    public function create() {
        return view('pages.employee.create');
    }

    public function save(Request $request) {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'required|string|max:255',
            'funcao' => 'required|string|max:100'
        ]);

        if($request->id == null) {
            $employee = new Employee;

            $employee->name = $request->nome;
            $employee->description = $request->descricao;
            $employee->function = $request->funcao;

            $employee->save();

            $request->session()->flash('success_new', 'Registro criado com sucesso');

            return redirect()->route('employee.home');
        } else {
            $employee = Employee::where('id', $request->id)->first();

            $employee->name = $request->nome;
            $employee->description = $request->descricao;
            $employee->function = $request->funcao;

            $employee->save();

            $request->session()->flash('success_edit', 'Registro alterado com sucesso');

            return redirect()->route('employee.home');
        }
    }

    public function edit($id) {
        $employee = Employee::where('id', $id)->first();

        return view('pages.employee.edit')->with([
            'employee' => $employee,
        ]);
    }

    public function delete(Request $request) {
        $employee = Employee::where('id', $request->id)->delete();

        $employees = Employee::all();

        return view('pages.employee.table_ajax')->with([
            'employees' => $employees,
        ]);
    }
}
