import { createApp } from 'vue';
import App from '../App.vue';
import { createRouter } from 'vue-router';
import { createWebHistory } from 'vue-router';
import Home from '../pages/Home.vue';

const routes = [
    { path: '/', component: Home },
];

const router = createRouter({
history: createWebHistory(),
routes,
});

export default router;