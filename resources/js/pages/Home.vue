<template>
    <NavBar></NavBar>
    <div class="loading-message" v-if="blogStore.loading"> Wait a second... </div>
    <div class="no-blogs" v-else-if="blogStore.blogs.length === 0"> Still not used this... </div>
    <div class v-else>
    <BlogGrid
    v-for="blog in blogStore.blogs" 
    :key="blog.id"
    :blog="blog"
    @click="openBlog(blog.id)"
    />
    </div>
</template>
<script setup>
import { ref, reactive, onMounted } from 'vue';
import { computed } from 'vue';
import BlogGrid from '../components/BlogGrid.vue';
import { useBlogStore } from '../stores/BlogStore';
import NavBar from '../components/NavBar.vue';
import { RouterLink, useRouter } from 'vue-router';

const blogStore = useBlogStore();
const router = useRouter();

onMounted(() => {
    blogStore.getAllBlogs();
});

function openBlog() {
    router.push(`blogs\${id}`);
}


</script>
<style scoped>
.blog-wrapper {
   display: flex;
   justify-content: center;
   align-items: center;
   gap: 1rem;
   margin-top: 1rem;

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