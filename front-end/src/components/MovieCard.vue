<script setup>

const props = defineProps({
    movie: Object,
})
</script>
<template>
    <div class="col py-3 sm:max-w-xl sm:mx-auto">
        <div class="bg-white shadow-lg border-gray-100 max-h-80	 border sm:rounded-3xl p-8 flex space-x-8">
            <div class="h-48 overflow-visible w-1/2">
                <img class="rounded-3xl shadow-lg" :src="movie.Poster">
            </div>
            <div class="flex flex-col w-1/2 space-y-4">
                <div class="flex justify-between items-start">
                    <h2 class="text-3xl font-bold"> {{ movie.Title }}</h2>
                </div>
                <div>
                    <div class="text-sm text-gray-400">{{ movie.Type }}</div>
                    <div class="text-lg text-gray-800"> {{ movie.Year }}</div>
                </div>

                <div class="flex text-2xl font-bold text-a">Id: {{ movie.imdbID }}</div>
            </div>

        </div>
    </div>
</template>