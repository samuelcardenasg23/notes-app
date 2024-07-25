<template>
  <div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
              Title
          </th>
          <th scope="col" class="px-6 py-3">
              Content
          </th>
          <th scope="col" class="px-6 py-3">
              Action
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="note in unarchivedNotes" :key="note.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <!-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{note.title}}
          </th> -->
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{note.title}}
          </td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{note.content}}
          </td>
          <td class="px-6 py-4">
              <button class="mr-5 font-medium text-white dark:text-white hover:underline" v-on:click="archiveNote(note.id)">Archive</button>
              <RouterLink :to="{ path: 'edit/' + note.id }" class="mr-5 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</RouterLink>
              <button class="-mr-20 font-medium text-red-400 dark:text-red-400 hover:underline" v-on:click="deleteNotes(note.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  import axios from 'axios'
  import { confirm } from '@/functions';

  export default{
    data(){
      return { notes:null, unarchivedNotes: null, }
    },
    mounted(){
      this.getNotes();
    },
    methods:{
      getNotes(){
        axios.get('http://127.0.0.1:8000/api/notes').then(
          response => {
            this.notes = response.data.data
            // Filter unarchived notes
            this.unarchivedNotes = this.notes.filter(note => !note.archived); // Assuming a boolean 'isArchived' property in note object
          }
        ).catch(err => console.log(err.message));
      },
      deleteNotes(id){
        confirm(id)
      },
      archiveNote(id) {
        axios.put(`http://127.0.0.1:8000/api/notes/${id}/archive`).then(
          () => {
            this.getNotes();
          }
        ).catch(err => console.log(err.message));
      }
    }
  }
</script>