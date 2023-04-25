<script setup>
import { store as store } from "../stores/script.js";
</script>


<template>
    <section class="input_wrapper">
        <div class="mb-3">
            <label class="d-block" for="filmByTitle">Cerca film dal titolo</label>
            <div class="wraper d-flex gap-1">
                <input id="filmByTitle" class="form-control p-1" @keyup.enter="store.callApi(store.URL_FILM, false)"
                    type="text" placeholder="Cerca" v-model="store.filmsQuery">
                <button class="btn btn-dark p-1" @click="store.callApi(store.URL_FILM, false)">Cerca</button>
            </div>
        </div>
        <div class="mb-3">
            <label class="d-block" for="filmById">Cerca film dall'id</label>
            <div class="wrapper d-flex gap-1">
                <input id="filmById" class="form-control p-1" @keyup.enter="store.callApi(store.URL_FILM, true)" type="text"
                    placeholder="Cerca" v-model="store.filmToSearchId">
                <button class="btn btn-dark p-1" @click="store.callApi(store.URL_FILM, true)">Cerca</button>
            </div>
        </div>
        <div class="position-relative" v-if="store.error">
            <div class="position-absolute alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Attenzione!</strong>
                {{ store.error === true ? "Prova ad inserire un parametro di ricerca!" :
                    store.error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </section>
</template>

<style scoped>
.input_wrapper {
    max-width: 350px;
    padding-top: 56px;
    margin: auto;
}
</style>
