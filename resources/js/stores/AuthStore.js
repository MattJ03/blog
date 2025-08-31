import { defineStore } from 'pinia';
import { ref, reactive } from 'vue'; 
import axios from 'axios';

export const useAuthStore = defineStore('auth', () => {

const token = ref('');
const user = ref(null);
const loading = ref(false);
const error = ref('');

async function login(email, password) {
    loading.value = true;
    try {
        const res = await axios.post('api/login', {email, password});
        user.value = res.data.user;
        token.value = res.data.token;
        localStorage.setItem('token', token.value);

        axios.defaults.headers.common['Authorization'] = "Bearer ${token.value}";
    } catch(error) {
        console.log(error.response?.data || error.message);
    } finally {
        loading.value = false; 
    }
}

async function logout() {
    loading.value = true;
    try {
        const res = await axios.post('api/logout');
        user.value = null;
        token.value = null;
        localStorage.removeItem('token');
        delete axios.defaults.headers.common['Authorization'];
    } catch(error) {
        console.log(error.response?.message || error.message);
    } finally {
        loading.value = false;
    }
}

});