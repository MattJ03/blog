import { defineStore } from 'pinia';
import { computed, ref } from 'vue';
import { reactive } from 'vue';
import axios from 'axios';
import { useAuthStore } from './AuthStore';
import api from '../axios';
import router from '../router/index';

export const useBlogStore = defineStore('blog', () => {

    const loading = ref(false);
    const error = ref('');
    const blogs = ref([]);
    const blog = ref(null);
    const emptyBlog = computed(() => blogs.length === 0);

    async function getAllBlogs() {
        loading.value = true;
        console.log('check 1');
        try {
            console.log('check 2');
            const res = await api.get('blogs');
            blogs.value = res.data.data;
        } catch (error) {
            console.log('error is ', error.response?.data || error.message);
        } finally {
            loading.value = false;
        }
    }

    async function getBlog(id) {
        loading.value = true;
        blog.value = null;
    try {
        console.log('running try in method for getBlog',);
        const res = await api.get(`blogs/${id}`);
        blog.value = res.data.data;
        console.log('got the  blog');
    } catch(error) {
        console.log(error.response?.data || error.message);
        console.log('got the error');
    } finally {
        loading.value = false;
    }
    }

    async function addBlog(blog) {
        loading.value = true;
        try {
            console.log('running the try part of the method in store');
            const res = await api.post('blogs', blog.value);
            blogs.push(blog);
            router.push('/blogs')
        } catch(error) {
            console.log(error.response?.data || error.message);
        }
    }

    return {
        loading, 
        error,
        blogs,
        blog,
        getAllBlogs,
        getBlog,
        addBlog,
};
});