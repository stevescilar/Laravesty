<template>
    <span>
       {{ listing.street }} {{ listing.streat_nr }}, {{ listing.city }}
    </span>
 </template>

 <script setup>
    defineProps ({
        listing: Object
    })
</script>