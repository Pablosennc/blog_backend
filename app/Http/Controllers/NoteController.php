<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        // Devolvemos las notas más nuevas primero
        return response()->json(Note::orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string'
        ]);

        $note = Note::create($validated);
        return response()->json($note, 201);
    }

    public function destroy($id)
    {
        $note = Note::find($id);
        if ($note) {
            $note->delete();
            return response()->json(['message' => 'Nota eliminada']);
        }
        return response()->json(['message' => 'No encontrada'], 404);
    }
}
