<script setup>
import { ref } from "vue";
import { useAuthStore } from "../stores/auth";
import Nav from "./Nav.vue";

const authStore = useAuthStore();

const form = ref({
  email: "",
  password: "",
});
</script>
<template>
  <Nav />
  <section>
    <div class="container pt-3">
      <div class="text-dark d-flex flex-column align-items-center">
        <div class="wrapper w-25 text-center">
          <h1 class="mb-4">Login</h1>
          <form @submit.prevent="authStore.handleLogin(form)">
            <div class="mb-3">
              <input type="email" placeholder="Email" v-model="form.email" class="form-control" />
              <div v-if="authStore.errors.email">
                {{ authStore.errors.email[0] }}
              </div>
            </div>
            <div class="mb-3">
              <input type="password" placeholder="Password" v-model="form.password" class="form-control" />
              <div v-if="authStore.errors.password" class="flex">
                {{ authStore.errors.password[0] }}
              </div>
            </div>
            <div class="mb-2">
              <button type="submit" class="btn btn-dark">
                Accedi
              </button>
            </div>
          </form>
          <router-link to="/register" class="text-decoration-none text-dark">
            Se non hai ancora un account, registrati qui!
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg"
              viewBox="0 0 16 16">
              <path
                d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
              <path
                d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
            </svg>
          </router-link>
        </div>
      </div>
    </div>
  </section>
</template>