import { createApp } from 'vue';
import App from 'resources/js/App.vue';
import { createPinia } from 'pinia';

const app = createApp(App);

const pinia = createPinia();

app.use(pinia);

app.mount('#app');
