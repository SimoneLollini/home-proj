import { reactive } from "vue";
import axios from "axios";
export const store = reactive({
    error: null,
    movies: null,
    storedMovies: null,
    movie: null,
    loading: true,
    moviesQuery: '',
    movieToSearchId: '',
    URL_MOVIE: 'http://localhost:8000/api/movies',
    callByTitle(URL) {
        axios
            .get(URL)
            .then(response => {
                if (response.data.success) {
                    this.movies = response.data.results
                    this.movie = ""
                } else {
                    this.error = response.data.results
                    this.movie = ""
                    this.movies = ""
                }
            })
            .catch(error => {
                this.movie = ""
                this.movies = ""
                this.error = true
            })
    },
    callById(URL) {
        axios
            .get(URL)
            .then(response => {
                if (response.data.success) {
                    this.movie = response.data.results
                    this.movies = null
                    this.movieToSearchId = ""
                } else {
                    this.error = response.data.results
                    this.movie = ""
                    this.movies = ""
                }
            })
            .catch(error => {
                this.movie = ""
                this.movies = ""
                this.error = true;
            })
    },
    /**
    * [callApi(URL, isId)]
    * @param  {[String]} URL 
    * @param  {[boolean]} isId [isId = true -> search by id
    *                           isId = false -> search by title]
    * 
    */
    callApi(URL, isId) {
        this.error = null;
        if (!isId) {
            this.callByTitle(URL += "/title/" + this.moviesQuery.toLocaleLowerCase())
        } else if (isId) {
            this.callById(URL += "/id/" + this.movieToSearchId.toLocaleLowerCase())
        } else {
            this.error = "Inserire dei caratteri di ricerca!"
            this.movies = null
            this.movie = null
        }
    },
    refactorTitle(title) {
        let newTitle = title;
        if (title.length > 12) {
            newTitle = title.slice(0, 12);
            return newTitle.trim() + '...'
        }
        return title
    },
    getStoredMovies() {
        const URL = this.URL_MOVIE + "/stored";
        axios
            .get(URL)
            .then(response => {
                if (response.data.success) {
                    console.log(response);
                    this.storedMovies = response.data.results
                    console.log(this.storedMovies);
                } else {
                    error = response.data.results
                    this.storedMovies = ""
                }
            })
    }
},
)