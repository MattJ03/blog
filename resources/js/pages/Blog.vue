<template>
<NavBar></NavBar>
<div class="loading" v-if="blogStore.loading === true"> Wait a moment... </div>
<div class="error" v-else-if="blogStore.blog === null"> Cooked </div>
<div v-else-if="blogStore.blog"> 
    <BlogTemplate
     :blog="blogStore.blog">

    </BlogTemplate>
</div>

</template>
<script setup>
import { ref, reactive, onMounted } from 'vue';
import { useBlogStore } from '../stores/BlogStore';
import router from '../router/index';
import { useRoute, useRouter } from 'vue-router';
import NavBar from '../components/NavBar.vue';
import BlogTemplate from '../components/BlogTemplate.vue';
const blogStore = useBlogStore();
const route= useRoute();
console.log('blog.vue file');

onMounted(() => {
    console.log('mounted');
    const blogId = route.params.id;
    blogStore.getBlog(blogId);
})



</script>
<style scoped>
.blog-container {
    border: 2px;
    display: flex;
    flex-direction: column;
    border-radius:16px;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color: #222428;
    margin: 20px auto;
    width: 50%;
}
.title {
    color: #f2f2f2;
    font-size: 18px;

}
.line-break {
    color: #f2f2f2;
}
.loading{
    font-size: large;
    background-color: black;
    color: #fff;
    border-radius: 14px;
    margin: 2px;
    border-radius: 16px;
}
.error {
    font-size: large;
    background-color: black;
    color: #fff;
    border-radius: 14px;
    margin: 2px;
}
</style>