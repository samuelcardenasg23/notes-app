<template>
  <div class="mt-20 w-full max-w-lg mx-auto">
    <h1 class="text-4xl font-bold text-center">Notes App</h1>
    <div class="mt-10 flex items-center justify-between">
      <div>Hey <span class="font-bold">User Name</span></div>
      <button class="cursor-pointer text-gray-200 hover:text-white">
        Log out
      </button>
    </div>
    <div class="mt-2.5">
      <AddNoteInput />
      <div class="mt-3.5">
        <div class="space-y-2.5">
          <NoteItem />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import AddNoteInput from '@/components/AddNoteInput.vue';
import NoteItem from '@/components/NoteItem.vue';
</script>