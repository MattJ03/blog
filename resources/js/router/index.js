import { createApp } from 'vue';
import { createRouter } from 'vue-router';
import { createWebHistory } from 'vue-router';
import Home from '../pages/Home.vue';

const routes = [
    { path: '/home', component: Home },
];

const router = createRouter({
routes,
history: createWebHistory(),
});

export default router;