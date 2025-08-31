import { createApp } from 'vue';
import App from 'resources/js/App.vue';
import { createPinia } from 'pinia';
import { useAuthStore } from '../js/stores/AuthStore';

const app = createApp(App);

const pinia = createPinia();

app.use(pinia);

const userStore = useAuthStore();
userStore.init();

app.mount('#app');
