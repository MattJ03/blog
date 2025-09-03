<template>
    <NavBar>

    </NavBar>
    <div class="blog-container">
        <h2 class="title"> {{ blog.title }}</h2>
        <br class="line=break"></br>
        <
    </div>
    
    </template>
    <script setup>
    import { ref, reactive, onMounted } from 'vue';
    import { marked } from 'marked';
    
    import NavBar from '../components/NavBar.vue';
   
    const props = defineProps( {
        blog: {
            type: Object,
            required: true,
        }
    });


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