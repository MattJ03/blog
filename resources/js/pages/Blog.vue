<template>
<NavBar></NavBar>
</template>
<script setup>
import { ref, reactive, onMounted } from 'vue';
import { useBlogStore } from '../stores/BlogStore';
import router from '../router/index';
import { useRoute, useRouter } from 'vue-router';
import NavBar from '../components/NavBar.vue';

const blogStore = useBlogStore();
const route= useRoute();




</script>
<style scoped>
.blog-container {
    border: 2px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color: #222428;
}
.title {
    color: #f2f2f2;

}
.line-break {
    color: #f2f2f2;
}
</style>