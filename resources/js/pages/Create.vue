<template>
    <NavBar></NavBar>    

    <div class="container">
        <div class="header-row">
            <button type="submit" class="create-button" @click="createBlog">Post</button>
        </div>
        <form @submit.prevent="">
        <input type="text" class="title" v-model="title" placeholder="Title...">
        <input type="text" class="category" v-model="category" placeholder="Category..."></input>
        <textarea class="blog-content" v-model="body" placeholder="Content..."></textarea>
        </form>
    </div>
</template>
<script setup>
import { ref, reactive, computed } from 'vue';
import NavBar from '../components/NavBar.vue';
import { useBlogStore } from '../stores/BlogStore';
import { useRouter } from 'vue-router';

const blogStore = useBlogStore();
const router = useRouter();

const title = ref('');
const body = ref('');
const category = ref('');

async function createBlog() {
   const newBlog = await blogStore.addBlog({
        title: title.value,
        body: body.value,
        category: category.value,
     });

     if(newBlog) {
        router.push('/');
     }
     
     console.log('blog created');
    
    }

</script>
<style scoped>
.container {
    background-color: #222428;
    width: 40%;
    margin: 10px auto;
    border-radius: 14px;
    padding: 20px;
}
.header-row {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 1rem;
}
.title {
     font-size: 20px;
     background-color: #3b3b3b;
     border:#222428;
     margin-right: auto;
     width: 100%;
     height: 30px;
     color: #F2F0EF;
     border-radius: 12px;
     size-adjust: wrap;
     margin-bottom: 10px;
}
.blog-content {
    margin: auto;
    width: 100%;
    height: 100vh;
    background-color: #3b3b3b;
    color: #F2F0EF;
    font-size: large;
    border-radius: 12px;
}
.category {
    background-color: #F2F0EF;
    height: 20px;
    background-color: #3b3b3b;
    margin-bottom: 15px;
    color: #F2F0EF;
    font-size: 18px;
    border-radius: 12px;
}
.create-button {
    padding: 0.5rem 1rem;
    font-size: 16px;
    background-color:#F2F0EF;
    width: 14%;
    border: #3b3b3b;
    border-radius: 14px;
    
}
</style>