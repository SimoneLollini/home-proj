<script setup>
import { ref } from "vue";
import { useAuthStore } from "../stores/auth";
import Nav from "./Nav.vue";

const authStore = useAuthStore();

const form = ref({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});
</script>
<template>
  <Nav />
  <section>
    <div class="container pt-3">
      <div>
        <div class="text-center text-dark d-flex justify-content-center">
          <div class="wrapper w-25">
            <h1 class="mb-4">Registrazione</h1>
            <form @submit.prevent="authStore.handleRegister(form)">
              <div class="mb-3 d-flex justify-content-center">
                <input type="text" placeholder="Name" v-model="form.name" class="form-control" />
                <div v-if="authStore.errors.name">
                  {{ authStore.errors.name[0] }}
                </div>
              </div>
              <div class="mb-3 d-flex justify-content-center">
                <input type="email" placeholder="Email" v-model="form.email" class="form-control" />
                <div v-if="authStore.errors.email">
                  {{ authStore.errors.email[0] }}
                </div>
              </div>
              <div class="mb-3 d-flex justify-content-center">
                <input type="password" placeholder="Password" v-model="form.password" class="form-control" />
                <div v-if="authStore.errors.password">
                  <span class="text-red-400 text-sm m-2 p-2">
                    {{ authStore.errors.password[0] }}
                  </span>
                </div>
              </div>
              <div class="mb-3 d-flex justify-content-center">
                <input type="password" placeholder="Conferma password" v-model="form.password_confirmation"
                  class="form-control" />
              </div>
              <div class="mb-10">
                <button type="submit" class="btn btn-dark mb-2">
                  Register
                </button>
              </div>
            </form>
            <router-link to="/login" class="text-decoration-none text-dark">
              Se hai già un account, accedi qui!
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
    </div>
  </section>
</template>