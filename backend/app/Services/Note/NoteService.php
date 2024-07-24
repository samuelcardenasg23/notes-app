<?php

namespace App\Services\Note;

use App\Models\Note;
use App\Repositories\NoteRepository;

class NoteService
{
    protected $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function store(string $title, string $content): Note
    {
        return $this->noteRepository->create([
            'title' => $title,
            'content' => $content,
        ]);
    }

    public function update(Note $note, string $title, string $content): bool
    {
        return $this->noteRepository->update($note, [
            'title' => $title,
            'content' => $content,
        ]);
    }

    public function delete(Note $note): bool
    {
        return $this->noteRepository->delete($note);
    }

    public function archive(Note $note): bool
    {
        return $this->noteRepository->archive($note);
    }

    public function unarchive(Note $note): bool
    {
        return $this->noteRepository->unarchive($note);
    }
}
