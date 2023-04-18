<template>
  <!-- <Link href="/">Home Page</Link> &nbsp; &nbsp;
  <Link href="/show">Show Page</Link> &nbsp; &nbsp; -->
  <Link href="/listing">Listings</Link>&nbsp;
  <Link href="/listing/create">New Listing</Link>

  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>

<slot />
</template>

<script setup>
import { computed } from 'vue' 
import { Link, usePage } from '@inertiajs/vue3'

const flashSuccess =  computed(
  () => usePage().props.flash.success,
)


</script>

<style scoped>
  .success {
    background-color: green;
    color: white;
  }
</style>
