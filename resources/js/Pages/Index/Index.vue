<template>
    <div>Index</div>
    <Link href="/show">Show Page</Link>
    <div>
        The message is  {{ message }}
    </div>
</template>

<!-- logic section -->
<script setup>
import { Link } from '@inertiajs/vue3'
// pass message to vuepage
defineProps(['message'])
</script>