<script setup>
import { store as store } from "../stores/script.js";
</script>


<template>
    <div class="search_bar gap-2 pt-2" v-if="this.$route.name === 'Home'">
        <label for="movieByTitle" class="block">Cerca film dal titolo</label>
        <input id="movieByTitle" class="form_control p-1" @keyup.enter="store.callApi(store.URL_MOVIE)" type="text"
            placeholder="Cerca" v-model="store.moviesQuery">
        <button class="bg-indigo-500 hover:bg-indigo-500 text-white font-bold p-1 rounded mx-1"
            @click="store.callApi(store.URL_MOVIE)">Cerca</button>
    </div>
    <div class="search_bar gap-2 pt-2">
        <label for="movieById" class="block">Cerca film dall'id</label>
        <input id="movieById" class="form_control p-1" @keyup.enter="store.callApi(store.URL_MOVIE)" type="text"
            placeholder="Cerca" v-model="store.movieToSearchId">
        <button class="bg-indigo-500 hover:bg-indigo-500 text-white font-bold p-1 rounded mx-1"
            @click="store.callApi(store.URL_MOVIE)">Cerca</button>
    </div>
</template>

<style scoped></style>
