import { reactive } from 'vue'
import axios from 'axios';
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

export const store = reactive({
    // url backend per le chiamate Api 
    urlBackend: "http://localhost:8000/api/",

    // contiene tutti i dati dell'user, 
    // compreso di appartamenti dell'utente loggato e i relativi messaggi
    // -- Se id é 0 oppure null non é loggato
    user: {
        apartments: [],
        id: 0,
        async getUser() {
            this.id = 0;
            store.loading.on();
            return await axios.get(`${store.urlBackend}user`)
                .then((res) => {
                    store.loading.off();
                    this.fillUser(res.data)
                    return { 'msg': 'logged' }
                })
                .catch((err) => {
                    this.id = null;
                    store.loading.off();
                    return err.response.data;
                })
        },
        fillUser(data) {
            this.id = data.user.id;
            this.name = data.user.name;
            this.surname = data.user.surname;
            this.email = data.user.email;
            this.image = data.user.image;
            this.email_verified_at = data.user.email_verified_at;
            this.admin = data.user.admin;

            this.apartments = data.apartments;
            store.loading.off();
        },
        async getApartments() {
            return await axios.get(`${store.urlBackend}userapartments`).then((res) => {
                this.apartments = res.data.apartments
                console.log(this.apartments)
                return { msg: 'loaded apartments' }
            }).catch((err) => {
                console.log(err)
            })
        },
        logout() {
            this.id = null;
            store.loading.on();
            // ridirect to home
            axios.post(`${store.urlBackend}logout`).then((res) => {
                console.log(res.data);
                store.loading.off();
                window.location.href = window.location.origin
            }).catch((err) => {
                store.loading.off();
                console.log('error: ', err);
            });
        },
    },
    address:{
        listAddresses:[],
        async searchAddresses(text) {
            console.log(text);
            this.position = await fetch(`https://api.tomtom.com/search/2/search/${encodeURI(text)}.json?key=orDHPznfE908Jeu45AKVaFSiSMAebYfQ`)
              .then((response) => response.json())
              .then((data) => {
                console.log(data.results);
      
                this.listAddresses = data.results
              })
              .catch(function (error) {
                reject(error);
              });
      
          }
    },

    // contine principalmente metodi per ottenere tutti o alcuni appartamenti
    // e anche ,l'utimo appartamento mostrato nella apartments.show (.current)
    apartment: {
        current: null,
        async getAll() {
            store.loading.on();
            return await axios.get(`${store.urlBackend}apartments`)
                .then((res) => {
                    store.loading.off();
                    return res.data.apartments
                })
                .catch((err) => {
                    store.loading.off();
                    console.log(err.response.data);
                    return err.response.data
                })
        }
    },

    category: {
        current: null,
        async getAll() {
            store.loading.on();
            return await axios.get(`${store.urlBackend}categories`)
                .then((res) => {
                    store.loading.off();
                    return res.data.categories
                })
                .catch((err) => {
                    store.loading.off();
                    console.log(err.response.data);
                    return err.response.data
                })
        }
    },

    // contiene tutti le categories, services e promotions
    options: {},

    // gestisce la schermata di caricamento 
    // invocando il metodo on() mostra la schermata di caricamento
    // invocando il metodo off() rimuove la schermata di caricamento
    loading: {
        state: false,
        on() {
            this.state = true;
        },
        off() {
            this.state = false;
        }
    },

    // oggetto per validare input 
    // il metodo isV(e) gestisce le classi nel template
    // gli altri (ex. _string) validano i campi controllando lunghezza o numero del value dell'input
    validate: {
        isV(e) {
            if (e === null) {
                return ''
            }
            if (e === true) {
                return 'is-valid'
            }
            if (e === false) {
                return 'is-invalid'
            }
        },
        _string(text, min = 3, max = 254) {
            if (
                text.length <= max &&
                text.length >= min
            ) {
                window.scrollTo(0, 0);
                return true;
            } else {
                return false;
            }
        },
        _integer(number, min = 1, max = 254) {
            if (
                number <= max &&
                number >= min &&
                number % 1 == 0
            ) {
                window.scrollTo(0, 0);
                return true;
            } else {
                return false;
            }
        },
        _boolean(bool) {
            if (
                bool == "0" ||
                bool == "1" ||
                bool == 0 ||
                bool == 1
            ) {
                window.scrollTo(0, 0);
                return true;
            } else {
                return false;
            }
        },
        _decimal(number, min = 1, max = 9999.99) {
            if (
                number <= max &&
                number >= min
            ) {
                window.scrollTo(0, 0);
                return true;
            } else {
                return false;
            }
        },
    },





})