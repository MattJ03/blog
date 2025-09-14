<template>
    <NavBar></NavBar>
    <div class="loading-message" v-if="blogStore.loading"> Wait a second... </div>
    <div class="no-blogs" v-else-if="blogStore.blogs.length === 0"> Still not used this... </div>
    <div v-else>
    <BlogGrid
    v-for="blog in blogStore.blogs" 
    :key="blog.id"
    :blog="blog"
     @click="openBlog(blog.id)"
    />
    </div>
    <div v-if="admin">
        <button class="add-blog" @click="router.push('/create')"> + </button>
    </div>
    
</template>
<script setup>
import { ref, reactive, onMounted } from 'vue';
import { computed } from 'vue';
import BlogGrid from '../components/BlogGrid.vue';
import { useBlogStore } from '../stores/BlogStore';
import NavBar from '../components/NavBar.vue';
import { RouterLink, useRouter } from 'vue-router';
import { useAuthStore } from '../stores/AuthStore';

const blogStore = useBlogStore();
const authStore = useAuthStore();
const router = useRouter();


onMounted(() => {
    blogStore.getAllBlogs();
});

function openBlog(id) {
    router.push(`/blog/${id}`);
}

const admin = authStore.token;


</script>
<style scoped>

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
.add-blog { 
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 55px;
    width: 80px;
    background-color: #F2F0EF;
    font-size: 15px;
    border-radius: 50px;
    margin-top: 200px;
    margin-left:  95%;
    margin-right: auto;
}
</style>