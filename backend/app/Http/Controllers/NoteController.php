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
        $notes = Note::with('categories')->paginate(10);

        return response()->json($notes);
    }

    public function store(NoteRequest $request)
    {
        $note = $this->noteService->store(
            $request->validated('title'),
            $request->validated('content'),
            $request->validated('category_ids') ?? [],
        );

        return response()->json($note);
    }

    public function show(Note $note)
    {
        $note->load('categories');

        return response()->json($note);
    }

    public function update(Note $note, NoteRequest $request)
    {
        $this->noteService->update(
            $note,
            $request->validated('title'),
            $request->validated('content'),
            $request->validated('category_ids') ?? [],
        );

        return response()->json($note);
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return response(status: 204);
    }

    public function archive(Note $note)
    {
        $this->noteService->archive($note);

        return response()->json($note);
    }

    public function unarchive(Note $note)
    {
        $this->noteService->unarchive($note);

        return response()->json($note);
    }

    public function archived()
    {
        $notes = Note::where('archived', true)->with('categories')->paginate(10);

        return response()->json($notes);
    }

    public function filterByCategory(Request $request)
    {
        $notes = $this->noteService->filterByCategory($request->category_id);
        return response()->json($notes);
    }
}
