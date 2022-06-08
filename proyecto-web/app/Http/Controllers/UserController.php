<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    //Consultar
    public function index()
    {
        $users = DB::select("call sp_consultaUsuarios");

        return view('users.index', compact('users'));
    }


    //Crear
    public function create()
    {
        return view('users.create');
    }


    //Guardar información
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha_nacimiento' => 'required',
            'sexo' => 'required|max:1'
        ]);


        DB::select(
            "call sp_insertarUsuario(?,?,?)",
            array($request->nombre, $request->fecha_nacimiento, $request->sexo)
        );

        return redirect()->action([UserController::class, 'index'])
            ->with('success-create', 'Usuario creado con éxito');
    }

    //Editar
    public function edit(User $user)
    {
        $sexos = User::select(['sexo'])->get();

        return view('users.edit', compact('user', 'sexos'));
    }

    //Actualizar información
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|max:1'
        ]);

        DB::select(
            "call sp_editarUsuario(?,?,?,?)",
            array($request->nombre, $request->fecha_nacimiento, $request->sexo, $user->id)
        );

        return redirect()->action([UserController::class, 'index'])
            ->with('success-update', 'Usuario modificado con éxito');
    }

    //Borrar
    public function destroy(User $user)
    {
        DB::select("call sp_eliminarUsuario(?)", array($user->id));

        return redirect()->action([UserController::class, 'index'])
            ->with('success-update', 'Usuario eliminado con éxito');
    }
}
