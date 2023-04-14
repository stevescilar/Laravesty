<template>
    <span>
        {{ listing.street }} {{ listing.streat_nr }}, {{ listing.city }}, for ${{ listing.price }}
    </span>
 </template>

 <script setup>
    defineProps ({
        listing: Object
    })
</script>