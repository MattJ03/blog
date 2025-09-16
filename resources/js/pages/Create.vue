<template>
    <NavBar></NavBar>
    <div class="container">
        <input type="text" class="title" v-model="title" placeholder="Title...">
        <textarea class="blog-content" v-model="body" placeholder="Content..."></textarea>
    </div>
</template>
<script setup>
import { ref, reactive, computed } from 'vue';
import NavBar from '../components/NavBar.vue';
import { useBlogStore } from '../stores/BlogStore';


const blogStore = useBlogStore();

const title = ref('');
const body = ref('');
const category = ref('');
</script>
<style scoped>
.container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #222428;
    width: 30%;
    margin: 10px auto;
    border-radius: 14px;
    padding: 20px;
}
.title {
     font-size: 20px;
     background-color: #3b3b3b;
     display: flex;
     flex-direction: column;
     justify-content: center;
     align-items: center;
     border:#222428;
     display: flex;
     justify-content: left;
     margin-right: auto;
     width: 100%;
     height: 30px;
     color: #F2F0EF;
     border-radius: 12px;
     size-adjust: wrap;

}
.blog-content {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    width: 100%;
    height: 100vh;

}
</style>