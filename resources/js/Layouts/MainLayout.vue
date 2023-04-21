<template>
  <!-- <Link href="/listing/create">New Listing</Link> -->

  <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 w-full">
    <div class="container mx-auto">
      <nav class="p-4 flex items-center justify-between">
        <div class="text-lg font-medium">
          <!-- <Link :href="{{ route('listing.index') }}">C</Link> -->
          <Link :href="route('listing.index')">Listings</Link>
        </div>
        <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
          <Link :href="route('listing.index')">LaraVesty</Link>
        </div>
      
        <div v-if="user" class="flex items-center gap-4">
          <div class="text-sm text-gray-500">Hi! <span class="font-bold text-green-600">{{ user.name }}</span></div>
          <Link :href="route('listing.create')" class="btn-primary">+ New Listing</Link>
          <div class="btn-secondary">Logout</div>
        </div>
        <div v-else>
          <Link :href="route('login')" class="btn-primary">Sign-In</Link>
        </div>
      </nav>
    </div>
  </header>
  <main class="container mx-auto p-4 w-full">
    <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
      {{ flashSuccess }}
    </div>
    <slot />
  </main>
</template>

<script setup>
import { computed } from 'vue' 
import { Link, usePage } from '@inertiajs/vue3'
import { BeakerIcon } from '@heroicons/vue/24/solid'

// const page =usePage()
const flashSuccess =  computed(
  () => usePage().props.flash.success,
)

const user = computed(
  () => usePage().props.user,
)
</script>