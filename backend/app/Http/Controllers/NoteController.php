<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use App\Services\Note\NoteService;

class NoteController extends Controller
{
    protected $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function index()
    {
        $notes = Note::paginate(10);

        return response()->json($notes);
    }

    public function store(NoteRequest $request)
    {
        $note = $this->noteService->store(
            $request->validated('title'),
            $request->validated('content'),
        );

        return response()->json($note);
    }

    public function show(Note $note)
    {
        return response()->json($note);
    }

    public function update(Note $note, NoteRequest $request)
    {
        $this->noteService->update(
            $note,
            $request->validated('title'),
            $request->validated('content'),
        );

        return response()->json($note);
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return response(status: 204);
    }
}
