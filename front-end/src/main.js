import { createApp, markRaw } from "vue";
import { createPinia } from "pinia";
import router from "./router";
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";

import "./axios";
import "./style.css";
import App from "./App.vue";

const pinia = createPinia();

pinia.use(({ store }) => {
  store.router = markRaw(router);
});

const app = createApp(App);
app.use(pinia);
app.use(router);

app.mount("#app");
