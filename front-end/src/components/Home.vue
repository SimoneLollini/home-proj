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
  <section class="flex justify-center justify-items-center pt-14">
    <div class="wrapper">
      <div v-if="authStore.user">
        <div class="search_bar">
          <SearchBar />
        </div>
        <div class="">
          <div class="grid grid-rows-3 grid-flow-col gap-4">
            <MovieCard :movie="movie" v-for="movie in store.movies" />
          </div>
        </div>
      </div>
      <div v-else class="text-center">
        <div class="text-2xl pb-3">Prima di continuare:</div>
        <router-link :to="{ name: 'Register' }" class="bg-indigo-500 p-2 rounded text-white text-md">
          Registrati
        </router-link>
      </div>
    </div>
  </section>
</template>