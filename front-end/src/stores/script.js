import { reactive } from "vue";
import axios from "axios";
export const store = reactive({
    error: null,
    films: null,
    film: null,
    storedFilms: null,
    loading: true,
    filmsQuery: '',
    filmToSearchId: '',
    URL_FILM: 'http://localhost:8000/api/films',
    callByTitle(URL) {
        axios
            .get(URL)
            .then(response => {
                if (response.data.success) {
                    this.films = response.data.results
                    this.film = ""
                } else {
                    this.error = response.data.results
                    this.film = ""
                    this.films = ""
                }
            })
            .catch(error => {
                this.film = ""
                this.films = ""
                this.error = true
            })
    },
    callById(URL) {
        axios
            .get(URL)
            .then(response => {
                if (response.data.success) {
                    this.film = response.data.results
                    this.films = null
                    this.filmToSearchId = ""
                } else {
                    this.error = response.data.results
                    this.film = ""
                    this.films = ""
                }
            })
            .catch(error => {
                this.film = ""
                this.films = ""
                this.error = true;
            })
    },
    /**
    * [callApi(URL, isId)]
    * @param  {[String]} URL 
    * @param  {[boolean]} isId [isId = true -> search by id
    *                           isId = false -> search by title]
    */
    callApi(URL, isId) {
        this.error = null;
        if (!isId) {
            this.callByTitle(URL += "/title/" + this.filmsQuery.toLocaleLowerCase())
        } else if (isId) {
            this.callById(URL += "/id/" + this.filmToSearchId.toLocaleLowerCase())
        } else {
            this.error = "Inserire dei caratteri di ricerca!"
            this.films = null
            this.film = null
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
    getStoredFilms() {
        const URL = this.URL_FILM + "/stored";
        axios
            .get(URL)
            .then(response => {
                if (response.data.success) {
                    this.storedFilms = response.data.results
                    console.log(this.storedFilms);
                } else {
                    error = response.data.results
                    this.storedFilms = ""
                }
            })
    },
    storeFilm() {
        store.loading = !store.loading;
        const URL = this.URL_FILM + "/store";
        const data = this.film;
        axios.post(URL, data).then((response) => {
            if (response.data.success) {
                console.log("success");
                store.loading = !store.loading;
            }
            else {
                console.log(response)
                store.loading = !store.loading;

            }
        });
    }
});