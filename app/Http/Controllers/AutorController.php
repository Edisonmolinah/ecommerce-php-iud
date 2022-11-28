<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Autor;

class AutorController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin.isValid']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $autores = Autor::all();
        return view('autor.index', ['autores' => $autores]);
    }

    public function principal(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100'
        ]);

        Autor::create([
            'name' => $request->name,
        ]);

        return redirect('/autor');
    }

    public function actionEdit($id)
    {
        $autor = Autor::find($id);

        if (empty($autor)) {
            return redirect('/autor');
        }

        return view('/autor.edit', ['autor' => $autor]);
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100'
        ]);

        $autor = Autor::find($id);

        if (empty($autor)) {
            return redirect('/autor');
        }

        $autor->name = $request->name;

        $autor->save();

        return redirect('/autor');
    }

}
