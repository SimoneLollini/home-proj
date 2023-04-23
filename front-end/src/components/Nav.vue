<script setup>
import { useAuthStore } from "../stores/auth";
import SearchBar from "./SearchBar.vue";

const authStore = useAuthStore();
</script>
<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <li>
          <router-link :to="{ name: 'Home' }" class=" nav-link " aria-current="page">Home</router-link>
        </li>
        </li>
        <li class="nav-item">
          <router-link :to="{ name: 'Login' }" class="nav-link">Login</router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{ name: 'Register' }" class="nav-link">
            Registrati
          </router-link>
        </li>
      </ul>
    </div>
    <button @click="authStore.handleLogout" class="btn btn-dark">
      Logout
    </button>
  </nav>
</template>

<style scoped></style>