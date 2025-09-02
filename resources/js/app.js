import { createApp } from 'vue';
import App from '../js/App.vue';
import router from './router/index';
import { createPinia } from 'pinia';
import { useAuthStore } from '../js/stores/AuthStore';


const app = createApp(App);

const pinia = createPinia();

app.use(pinia);
app.use(router);
const userStore = useAuthStore(pinia);
userStore.init();

app.mount('#app');
