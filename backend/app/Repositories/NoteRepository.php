<?php

namespace App\Repositories;

use App\Models\Note;

class NoteRepository
{
    public function create(array $data): Note
    {
        return Note::create($data);
    }

    public function update(Note $note, array $data): bool
    {
        return $note->update($data);
    }

    public function delete(Note $note): bool
    {
        return $note->delete();
    }
}
