<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostApiController extends Controller
{
    public function index() {
        $posts = Post::with(['Autor', 'Categoria','Post'])->get();
        return response()->json($posts, 200);
    }

    public function getById($id) {
        $post = Post::with(['Autor', 'Categoria','Post'])
                            ->where('id', $id)    
                            ->first();

        if (empty($post)) {
            return response()->json(['message' => 'Not Found'], 404);
        }      

        return response()->json($post, 200);
    }
}
