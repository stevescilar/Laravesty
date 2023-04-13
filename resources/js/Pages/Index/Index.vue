<template>
 
        <div>Index</div>
        <div>
            The message is -- : {{ message }} --.
        </div>
  
   
</template>

<!-- logic section -->
<script setup>
    // pass message to vuepage
    defineProps({
        // define Props Type
        message: String
    })

</script>

<!-- persistent Layout -->
<script>
    import MainLayout from '../../Layouts/MainLayout.vue';
    export default {
    layout: MainLayout
    }

</script>
