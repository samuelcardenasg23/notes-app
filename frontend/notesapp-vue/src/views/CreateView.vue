<template>
    <div class="flex flex-col justify-center items-center">
        <h1 class="mt-10 text-4xl font-bold text-center">Add Note</h1>
        <form @submit.prevent="store" class="mt-5 w-full max-w-lg mx-auto flex flex-col">
            <input
                class="p-3.5 rounded border-b border-gray-300 text-gray-900 outline-none"
                type="text"
                v-model="title"
                id="title"
                placeholder="Title"
                required
            />
            <textarea
                class="mt-5 p-3.5 rounded text-gray-900 outline-none"
                type="text"
                v-model="content"
                id="content"
                placeholder="Content"
                required
            />
            <label for="categories" class="mt-5 block mb-2 text-md font-medium text-gray-900 dark:text-white">Select Categories</label>
            <select 
                class="p-3.5 rounded border-b border-gray-300 text-gray-900 outline-none" 
                v-model="selectedCategories" 
                multiple
            >
                <option v-for="category in categories" :key="category.id" :value="category.id">
                    {{ category.name }}
                </option>
            </select>
            <button class="bg-blue-500 hover:bg-blue-600 mt-5 py-2.5 rounded">Add Note</button>
        </form>
  </div>
</template>

<script>
    import { show_alert, sendRequest } from '@/functions';
    import axios from 'axios';

    export default{
        data(){
            return {
                title: '',
                content: '',
                categories: [],
                selectedCategories: [],
                url: 'http://127.0.0.1:8000/api/notes',
            }
        },
        mounted() {
            this.getCategories()
        },
        methods: {
            store() {
                if (this.title.trim() === '') {
                    show_alert('Add a title to the note', 'warning', 'title')
                } else if(this.content.trim() === '') {
                    show_alert('Add the content to the note', 'warning', 'content')
                } else{
                    const parameters = {
                        title: this.title.trim(),
                        content: this.content.trim(),
                        category_ids: this.selectedCategories,
                    }
                    sendRequest('POST', parameters, this.url, 'Note saved!')
                }
            },
            getCategories() {
                axios.get('http://127.0.0.1:8000/api/categories').then(
                    response => {
                        this.categories = response.data.data
                    }
                    ).catch(err => console.log(err.message));
            }
        }
    }
</script>