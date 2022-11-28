<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class HomeController extends Controller
{
    const ADMIN_ROLE = 1;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products;
        
        if ($request->usuario()->role_id == self::ADMIN_ROLE) {
            $posts = Post::with(['Autor', 'Categoria','Post'])->get();
        } else {
            $posts = Post::with(['Autor', 'Categoria','Post'])
                                    ->where('autor_id', $request->usuario()->autor_id)
                                    ->get();
        }

        return view('home', ['posts' => $posts]);
    }
}
