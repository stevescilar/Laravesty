<template>
<Link href="/">Home Page</Link> &nbsp; &nbsp;
<Link href="/show">Show Page</Link>
<div>The page with time {{ timer }}</div>
<slot></slot>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3'
    import {  ref } from 'vue'
    
    const timer = ref(0)
    setInterval (() => timer.value++, 1000)
</script>

