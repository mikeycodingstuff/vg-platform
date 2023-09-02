import { createApp } from 'vue';
import { createPinia } from 'pinia';
import App from './App.vue';
import router from './routes';
import './main.css';

const app = createApp(App);
const pinia = createPinia();

app.use(pinia);
app.use(router);
app.mount('#app');

// Set the initial data-theme attribute
document.documentElement.setAttribute(
  'data-theme',
  localStorage.getItem('theme') || 'defaultTheme',
);
