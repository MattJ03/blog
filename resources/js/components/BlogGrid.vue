<template>
    <div class="blog-container">
        <p class="blog-id"> {{ blog.id }} </p>
        <p class="blog-title"> {{ blog.title }}</p>
        <div class="categories-section">
            <p> {{  blog.category }}</p>
        </div>

    </div>

</template>
<script setup>
import { ref, reative } from 'vue';
import { computed } from 'vue';

defineProps({
    blog: {
    type: Object,
    required: true,
    }
})

</script>
<style scoped>
.blog-container {
    margin: 2px;
    border-radius: 14px;
    border: 2px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #222428;
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
    background-color: #F2F0EF;
}

</style>