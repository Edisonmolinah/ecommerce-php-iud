<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Autor;
use App\Models\Lector;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'usuario.post.isValid']);
    }

    public function index(Request $request)
    {
        $category = Category::all();
        $brand = Brand::all();
        $posts = Post::with(['Categoria', 'Autor', 'Post'])
                            ->where('autor_id', $request->usuario()->autor_id)
                            ->get();

        return view('post.index', [
            'categorias' => $category,
            'autor' => $autores,
        ]);
    }

    public function principal(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required|string|max:200',
            'estado' => 'required|string|max:40',
            'contenido' => 'required|string|max:1000',
            'categoria_id' => ['required', 'integer'],
        ]);

        Post::create([
            'titulo' => $request->name,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'contenido' => $request->contenido,
            'categoria_id' => $request->categoria_id,
            'autor_id' => $request->user()->autor_id,
        ]);

        return redirect('/post');
    }
}
