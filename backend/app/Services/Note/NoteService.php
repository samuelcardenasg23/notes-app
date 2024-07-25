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

    public function store(string $title, string $content, array $categoryIds): Note
    {
        $note = $this->noteRepository->create([
            'title' => $title,
            'content' => $content,
        ]);

        $this->noteRepository->attachCategories($note, $categoryIds);

        return $note;
    }

    public function update(Note $note, string $title, string $content, array $categoryIds): bool
    {
        $updated = $this->noteRepository->update($note, [
            'title' => $title,
            'content' => $content,
        ]);

        if ($updated) {
            $this->noteRepository->attachCategories($note, $categoryIds);
        }

        return $updated;
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

    public function filterByCategory($categoryId)
    {
        return $this->noteRepository->filterByCategory($categoryId);
    }
}
