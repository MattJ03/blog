<template>
    <h1> Hello </h1>
    <div class="loading-message" v-if="blogStore.loading"> Wait a second... </div>
</template>
<script setup>
import { ref, reactive, onMounted } from 'vue';
import { computed } from 'vue';
import BlogGrid from '../components/BlogGrid.vue';
import { useBlogStore } from '../stores/BlogStore';

const blogStore = useBlogStore();

onMounted(() => {
    blogStore.getAllBlogs();
});
</script>
<style scoped>
.blog-container {
    margin: 2px;
    border-radius: 14px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.blog-title {
    margin: 2px;
    border-radius: 14px;
}
.blog-body {
    margin: 2px;
    border-radius: 14px;
}
.collection-blogs {
    margin: 2px;
    border: 2px;
    display: flex;
    justify-content: center;
    align-items: center;

}
.loading-message {
    font-size: large;
    background-color: black;
    color: #fff;
    border-radius: 14px;
    margin: 2px;
    border-radius: 16px;
}
.no-blogs {
    font-size: large;
    background-color: black;
    color: #fff;
    border-radius: 14px;
    margin: 2px;
}

.title-home {
    font-size: 20px;
    color: #fff;
}
</style>