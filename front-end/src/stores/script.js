import { reactive } from "vue";
import axios from "axios";
export const store = reactive({
    error: null,
    movies: null,
    loading: true,
    moviesQuery: '',
    movieToSearchId: '',
    URL_MOVIE: 'http://localhost:8000/api/movies',
    callApi(URL) {
        if (this.moviesQuery) {
            URL += "/title/" + this.moviesQuery.toLocaleLowerCase()
        } else {
            this.error = "Inserire dei caratteri di ricerca!"
            this.movies = null
            console.log(this.error);
        }
        axios
            .get(URL)
            .then(response => {
                console.log(response);
                if (response.data.success) {
                    this.movies = response.data.results
                    console.log(this.movies);
                } else {
                    this.error = true
                }
            })
            .catch(error => {
                this.movies = null
                this.error = true
            })
            .finally(() => this.loading = false)
    }
    // ,
    // isMoviesEmpty() {
    //     return this.movies.length > 0
    // }
},
)