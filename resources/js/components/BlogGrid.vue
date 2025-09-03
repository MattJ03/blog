<template>
    <div class="blog-container">
        <h2 class="blog-id"> {{ blog.id }} </h2>
        <p class="blog-title"> {{ blog.title }}</p>
        <div class="categories-section">
            <p> {{  blog.category }}</p>
        </div>
        
    </div>
  
</template>
<script setup>
import { ref, reactive } from 'vue';
import { computed } from 'vue';
import { useBlogStore } from '../stores/BlogStore';

defineProps({
    blog: {
    type: Object,
    required: true,
    }
});


</script>
<style scoped>
.blog-container {
    margin: 1rem auto;
    border-radius: 14px;
    border: 2px, solid;
    border-color: #F2F0EF;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #222428;
    width: 50%;

}
.blog-title {
    margin: 2px;
    border-radius: 14px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.blog-body {
    margin: 2px;
    border-radius: 14px;
}
.blog-id {
    margin: 2px;
    display: flex;
    justify-content: left;
    align-items: center;
}
.categories-section {
    display: flex;
   
}

</style>