<template>
    <div class="group flex flex-col bg-gray-200 rounded-lg px-5 py-3.5 text-gray-900">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <button :class="[archived ? 'bg-blue-500 border-blue-500' : 'border-gray-500', 'hover:border-blue-500 border-2 w-5 h-5 rounded-full flex items-center justify-center text-white cursor-pointer']" @click="toggle">
                    <!-- cambiar svg por una cajita -->
                    <svg v-if="archived" style="width: 15px; height: 15px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                    </svg>
                </button>
                <span :class="[archived && 'text-red-500', 'ml-2.5']">
                    Note Title
                </span>
            </div>
            <div class="flex items-center">
                <button class="opacity-100 text-gray-500 hover:text-gray-900">
                    <!-- cambiar svg por lapiz -->
                    <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M9,8H11V17H9V8M13,8H15V17H13V8Z" />
                    </svg>
                </button>
                <button class="opacity-100 text-gray-500 hover:text-gray-900">
                    <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M9,8H11V17H9V8M13,8H15V17H13V8Z" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="mt-2 ml-7">
            <span>
            Note Content
            </span>
        </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const archived = ref(false)
  
  const toggle = () => {
    archived.value = !archived.value
  }
  </script>
  
  <style scoped>
  /* Add any additional styling here if needed */
  </style>
  