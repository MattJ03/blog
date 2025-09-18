import { defineStore } from 'pinia';
import { computed, ref } from 'vue';
import { reactive } from 'vue';
import axios from 'axios';
import { useAuthStore } from './AuthStore';
import api from '../axios';
import router from '../router/index';
import { useRouter } from 'vue-router';

export const useBlogStore = defineStore('blog', () => {

    const loading = ref(false);
    const error = ref('');
    const blogs = ref([]);
    const blog = ref(null);
    const currentBlog = ref('');
    const emptyBlog = computed(() => blogs.length === 0);
    const pagination = ref({current_page: 1, last_page: 1});
    const router = useRouter();

    async function getAllBlogs(page = 1) {
        loading.value = true;
        console.log('check 1');
        try {
            console.log('check 2');
            const res = await api.get('blogs');
            blogs.value = res.data.data;
            pagination.value = {
                current_page: res.data.current_page,
                last_page: res.data.last_page,
            };
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
        blog.value = res.data.blog;
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
            const res = await api.post('blogs', blog);
            console.log('before push blog');
            blogs.value.push(res.data);
            return res.data;
            console.log('router used');
        } catch(error) {
            console.log(error.response?.data || error.message);
        } finally {
        loading.value = false;
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