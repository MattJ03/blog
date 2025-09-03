import { createApp } from 'vue';
import App from '../App.vue';
import { createRouter } from 'vue-router';
import { createWebHistory } from 'vue-router';
import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Projects from '../pages/Projects.vue';
const routes = [
    { path: '/', component: Home },
    { path: '/about', component: About },
];

const router = createRouter({
history: createWebHistory(),
routes,
});

export default router;