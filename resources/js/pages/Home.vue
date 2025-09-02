<template>
    <h1> Hello </h1>
    <h1 class="title-home"> Blogs </h1>

    <div class="loading-message" v-if="loading"> Wait a moment... </div>
    <div class="no-blogs" v-else-if="blogs.length === 0"> Still used this </div>
    <BlogGrid
    v-for="blog in blogs"
    :key="id"
    :blog="blog"
     />
</template>
<script setup>
import { ref, reactive, onMounted } from 'vue';
import { computed } from 'vue';
import BlogGrid from '../components/BlogGrid.vue';
import { useBlogStore } from '../stores/BlogStore';
import { storeToRefs } from 'pinia';


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