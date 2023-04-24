<script setup>
import { useAuthStore } from "../stores/auth";
import SearchBar from "./SearchBar.vue";

const authStore = useAuthStore();
</script>
<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark ">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link :to="{ name: 'Home' }" class="nav-link" aria-current="page">Home</router-link>
          </li>
          <template v-if="!authStore.user">
            <li class="nav-item">
              <router-link :to="{ name: 'Login' }" class="nav-link">Login</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'Register' }" class="nav-link">
                Registrati
              </router-link>
            </li>
          </template>
          <template v-else>
            <li class="nav-item d-flex align-items-center">
              <button @click="authStore.handleLogout" class="btn btn_light"> Logout</button>
            </li>
          </template>
        </ul>

      </div>
    </div>
  </nav>
</template>

<style scoped>
.btn_light {
  color: rgba(255, 255, 255, 0.55);
}
</style>