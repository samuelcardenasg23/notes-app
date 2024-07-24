<template>
    <div class="min-h-screen flex flex-col justify-center items-center">
      <h1 class="text-4xl font-bold text-center">Notes App</h1>
      <h2 class="text-xl font-bold text-center">Sign up</h2>
      <form class="w-full max-w-lg mx-auto flex flex-col">
        <input
          class="mt-5 p-3.5 rounded border-b border-gray-300 text-gray-900 outline-none"
          type="text"
          placeholder="Username"
          required
        />
        <input
          class="mt-5 p-3.5 rounded rounded-b text-gray-900 outline-none"
          type="password"
          placeholder="Password"
          required
        />
        <button class="bg-blue-500 hover:bg-blue-600 mt-5 py-2.5 rounded">
          Sign up
        </button>
      </form>
      <div class="mt-5">
        Already have an account?
        <RouterLink class="text-blue-400" :to="{ name: 'Login' }"
          >Log in here</RouterLink
        >
      </div>
    </div>
  </template>
  
  <script setup></script>