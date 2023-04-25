<script setup>
import { onMounted } from "vue";
import { useAuthStore } from "../stores/auth";
import { store } from "../stores/script.js";
import Nav from "./Nav.vue";
import SearchBar from "./SearchBar.vue";
import MovieCard from "./MovieCard.vue"

const authStore = useAuthStore();

onMounted(async () => {
  store.movie = "";
  store.movies = "";
  await authStore.getUser();
});
</script>
<template>
  <Nav />
  <section class="text-dark ">
    <div v-if="authStore.user">
      <div class="container">
        <h1 class="text-center p-4 bg-dark text-white m-4 rounded-3">
          Qui puoi cercare tutti i film!
        </h1>
        <SearchBar />
        <div class="row row-cols-5 justify-content-center">
          <MovieCard v-if="store.movies" :movie="movie" v-for="movie in store.movies" />
          <MovieCard v-if="store.movie" :movie="store.movie" />
        </div>
      </div>
    </div>
    <div v-else class="call_to_reg text-center">
      <h2 class="text-2xl pt-3 pb-2">Prima di continuare:</h2>
      <div class="m-2">
        <router-link :to="{ name: 'Login' }" class="btn btn-dark">
          Accedi
        </router-link>
      </div>

      oppure...

      <div class="m-2">
        <router-link :to="{ name: 'Register' }" class="btn btn-dark">
          Registrati
        </router-link>
      </div>
    </div>
  </section>
</template>
<style scoped>
.call_to_reg {
  padding-top: 56px;
}
</style>