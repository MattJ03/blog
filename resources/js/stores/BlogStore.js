import { defineStore } from 'pinia';
import { ref } from 'vue';
import { reactive } from 'vue';
import axios from 'axios';

export const useBlogStore = defineStore('blog', () => {

    const loading = ref(false);
    const error = ref('');
    const blogs = ref([]);
    const blog = reactive({});

    async function getAllBlogs() {
        loading.value = true;
        try {
            const res = await axios.get('api/blogs');
            blogs.value = res.data.data;
        } catch (error) {
            console.log('error is ', error.response?.data || error.message);
        } finally {
            loading.value = false;
        }
    }

    async function getBlog(id) {
        loading.value = true;
    try {
        const res = await axios.get("api/blogs/$id");
        blog.value = res.data.data;
    } catch(error) {
        console.log(error.response?.data || error.message);
    } finally {
        loading.value = false;
    }
    }

    async function addBlog(blog) {
        loading.value = true;
        try {

            const res = await axios.post('api/blogs', blog.value);
        } catch(error) {
            console.log(error.response?.data || error.message);
        }
    }

    return [
        loading, 
        error,
        blogs,
        blog,
        get
    ]
});