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


