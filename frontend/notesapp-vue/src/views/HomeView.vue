<template>
  
  <form class="mt-5 max-w-sm mx-auto">
    <label for="category-filter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter by Category:</label>
    <select 
      id="category-filter" 
      v-model="selectedCategory" 
      @change="filterByCategory"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option value="">All Categories</option>
      <option v-for="category in categories" :key="category.id" :value="category.id">
        {{ category.name }}
      </option>
    </select>
  </form>

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
              Category
          </th>
          <th scope="col" class="px-6 py-3">
              Action
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="note in filteredNotes" :key="note.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{note.title}}
          </td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{note.content}}
          </td>
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            <!-- Display categories for each note -->
            <div v-for="category in note.categories" :key="category.id">
              {{ category.name }}
            </div>
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
      return { 
        notes:null, 
        unarchivedNotes: null, 
        categories: [], 
        selectedCategory: '',
      }
    },
    computed: {
      filteredNotes() {
        if (this.selectedCategory === '') {
          return this.unarchivedNotes
        }
        return this.unarchivedNotes.filter(note =>
          note.categories.some(category => category.id === this.selectedCategory)
        )
      }
    },
    mounted(){
      this.getNotes()
      this.getCategories()
    },
    methods:{
      getNotes(){
        axios.get('http://127.0.0.1:8000/api/notes').then(
          response => {
            this.notes = response.data.data
            
            this.unarchivedNotes = this.notes.filter(note => !note.archived);
          }
        ).catch(err => console.log(err.message));
      },
      getCategories() {
        axios.get('http://127.0.0.1:8000/api/categories').then(
          response => {
            this.categories = response.data.data
          }
        ).catch(err => console.log(err.message))
      },
      filterByCategory() {},
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