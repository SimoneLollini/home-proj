<script setup>
import { onMounted } from "vue";
import { useAuthStore } from "../stores/auth";
import { store } from "../stores/script.js";
import Nav from "./Nav.vue";
import SearchBar from "./SearchBar.vue";
import MovieCard from "./MovieCard.vue"

const authStore = useAuthStore();

onMounted(async () => {
  await authStore.getUser();
});
</script>
<template>
  <Nav />
  <section class="text-white">
    <div v-if="authStore.user">
      <div class="container">
        <SearchBar />
        <div class="overflow_card row row-cols-5 justify-content-center">
          <MovieCard v-if="store.movies" :movie="movie" v-for="movie in store.movies" />
          <MovieCard v-if="store.movie" :movie="store.movie" />
        </div>
      </div>
    </div>
    <div v-else class="call_to_reg text-center">
      <h2 class="text-2xl pt-3 pb-2">Prima di continuare:</h2>
      <router-link :to="{ name: 'Register' }" class="btn btn-dark">
        Registrati
      </router-link>
    </div>
  </section>
</template>
<style scoped>
nav {
  z-index: 1000;
  width: 100%;
  position: fixed;
  top: 0;
}

.overflow_card {
  height: 60vh;
  overflow-y: auto;

}

::-webkit-scrollbar {
  background: transparent;
}

.call_to_reg {
  padding-top: 56px;
}
</style>