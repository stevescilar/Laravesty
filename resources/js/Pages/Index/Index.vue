<template>
    
   <MainLayout>
        <div>Index</div>
        <div>
            The message is -- : {{ message }} --.
        </div>
   </MainLayout>
    
   
</template>

<!-- logic section -->
<script setup>
    import MainLayout from '../../Layouts/MainLayout.vue';
    // pass message to vuepage
    defineProps({
        // define Props Type
        message: String
    })

</script>