<template>
    <div class="min-h-screen flex flex-col justify-center items-center">
      <h1 class="text-4xl font-bold text-center">Notes App</h1>
      <h2 class="text-xl font-bold text-center">Log in</h2>
      <form class="mt-5 w-full max-w-lg mx-auto flex flex-col">
        <input
          class="p-3.5 rounded border-b border-gray-300 text-gray-900 outline-none"
          type="text"
          placeholder="Username"
          required
        />
        <input
          class="mt-5 p-3.5 rounded text-gray-900 outline-none"
          type="password"
          placeholder="Password"
          required
        />
        <button class="mt-5 rounded bg-blue-500 hover:bg-blue-600 py-2.5">
          Log in
        </button>
      </form>
      <div class="mt-5">
        Don't have an account?
        <RouterLink class="text-blue-400" :to="{ name: 'Signup' }">
            Sign up here
        </RouterLink>
      </div>
    </div>
  </template>
  
  <script setup>
import { RouterLink } from 'vue-router';
</script>