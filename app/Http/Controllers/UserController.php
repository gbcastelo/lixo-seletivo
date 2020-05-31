<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
        $users = User::all();

        return view('pages.users.index')->with([
            'users' => $users
        ]);
    }

    public function create() {
        return view('pages.users.create');
    }
    
    public function delete(Request $request) {
        $user = User::where('id', $request->id)->delete();

        $users = User::all();

        return view('pages.users.table_ajax')->with([
            'users' => $users,
        ]);
    }

    public function edit_name($id) {
        $user = User::where('id', $id)->first();

        return view('pages.users.edit_name')->with([
            'user' => $user,
        ]);
    }

    public function edit_email($id) {
        $user = User::where('id', $id)->first();

        return view('pages.users.edit_email')->with([
            'user' => $user,
        ]);
    }

    public function edit_pass($id) {
        $user = User::where('id', $id)->first();

        return view('pages.users.edit_pass')->with([
            'user' => $user,
        ]);
    }

    public function edit_permission($id) {
        $user = User::where('id', $id)->first();

        return view('pages.users.edit_permission')->with([
            'user' => $user,
        ]);
    }

    public function save_name(Request $request) {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:100',
        ]);

        $user = User::where('id', $request->id)->first();

        $user->name = $request->nome;

        $user->save();

        $request->session()->flash('success_edit', 'Registro alterado com sucesso');

        return redirect()->route('user.home');
    }

    public function save_email(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('id', $request->id)->first();

        $user->email = $request->email;

        $user->save();

        $request->session()->flash('success_edit', 'Registro alterado com sucesso');

        return redirect()->route('user.home');
    }

    public function save_pass(Request $request) {
        $validatedData = $request->validate([
            'senha' => 'required|string|min:8',
        ]);

        $user = User::where('id', $request->id)->first();

        $user->password = Hash::make($request->senha);

        $user->save();

        $request->session()->flash('success_edit', 'Registro alterado com sucesso');

        return redirect()->route('user.home');
    }

    public function save_permission(Request $request) {
        $user = User::where('id', $request->id)->first();

        if ($request->permissao == 1 && $user->hasPermissionTo('edit users')) {

            $request->session()->flash('error_already', 'Esse usuário já possui essa permissão');

            return redirect()->route('user.home');

        } else if($request->permissao == 0 && $user->hasPermissionTo('edit users')) {

            $user->revokePermissionTo('edit users');

            $request->session()->flash('success_edit', 'Registro alterado com sucesso');

            return redirect()->route('user.home');

        } else if($request->permissao == 0 && !$user->hasPermissionTo('edit users')) {
            
            $request->session()->flash('error_already', 'Esse usuário já possui essa permissão');
        
            return redirect()->route('user.home');

        } else if($request->permissao == 1 && !$user->hasPermissionTo('edit users')) {

            $user->givePermissionTo('edit users');

            $request->session()->flash('success_edit', 'Registro alterado com sucesso');

            return redirect()->route('user.home');

        }
    }
}
