import { defineStore } from 'pinia';
import { ref } from 'vue';
import { reactive } from 'vue';
import axios from 'axios';

export const useBlogStore = defineStore('blog', {

    const loading = ref(false);
    const error = ref('');
    const blogs = ref([]);
    const blog = reactive('');

    async function getAllTasks() {
        loading.value = true;
        try {
            const res = await axios.get('api/blogs');
        }
    }
});