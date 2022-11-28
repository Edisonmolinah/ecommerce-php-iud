<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Autor;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    const A_ROL = 2;
    const DEFAULT_PASSWORD = '123456789';

    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin.isValid']);
    }

    public function index(Request $request)
    {
        $usuario = Use::with(['Role', 'Autor'])->get();
        $autores = Autor::all();

        // vista return
        return view('usuario.index', ['usuario' => $usuarios, 'sellers' => $sellers]);
    }

    protected function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'autor_id' => ['required', 'integer'],
        ]);

        Usuario::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => self::A_ROL,
            'autor_id' =>  $request->autor_id,
            'password' => Hash::make(self::DEFAULT_PASSWORD),
        ]);

        return redirect('/usuario');
    }

    public function actionEdit($id)
    {
        $usuario = Usuario::find($id);
        //dd($usuario);
        $autores = Autor::all();

        if (empty($usuario)) {
            return redirect('/usuario');
        }

        return view('/usuario.edit', ['usuario' => $usuario, 'sellers' => $sellers]);
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'autor_id' => ['required', 'integer'],
        ]);

        $usuario = Usuario::find($id);

        if (empty($usuario)) {
            return redirect('/usuario');
        }

        $usuario->name = $request->name;
        $usuario->autor_id = $request->autor_id;

        $usuario->save();

        return redirect('/usuario');
    }
}
