<template>
    <div class="flex flex-col justify-center items-center">
        <h1 class="mt-10 text-4xl font-bold text-center">Add Category</h1>
        <form @submit.prevent="store" class="mt-5 w-full max-w-lg mx-auto flex flex-col">
            <input
                class="p-3.5 rounded border-b border-gray-300 text-gray-900 outline-none"
                type="text"
                v-model="name"
                id="name"
                placeholder="name"
                required
            />
            <button class="bg-blue-500 hover:bg-blue-600 mt-5 py-2.5 rounded">Add Category</button>
        </form>
  </div>
</template>

<script>
    import { show_alert, sendRequest } from '@/functions';

    export default{
        data(){
            return {
                name: '',
                url: 'http://127.0.0.1:8000/api/categories',
            }
        },
        methods: {
            store() {
                if (this.name.trim() === '') {
                    show_alert('Add a name to the category', 'warning', 'name')
                } else{
                    const parameters = {
                        name: this.name.trim(),
                    }
                    sendRequest('POST', parameters, this.url, 'Category created!')
                }
            }
        }
    }
</script>