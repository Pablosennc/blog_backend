<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // GET /api/posts
    public function index()
    {
        return response()->json(Post::orderBy('created_at', 'desc')->get());
    }

    // POST /api/posts
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|url' // Validamos que sea una URL válida
        ]);

        $post = Post::create($validated);

        return response()->json($post, 201);
    }

    // GET /api/posts/{id}
    public function show(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }
        return response()->json($post);
    }

    // PUT/PATCH /api/posts/{id}
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'image' => 'sometimes|url'
        ]);

        $post->update($validated);

        return response()->json($post);
    }

    // DELETE /api/posts/{id}
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post no encontrado'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post eliminado correctamente']);
    }
}