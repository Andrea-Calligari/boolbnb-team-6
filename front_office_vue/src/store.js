import { reactive } from 'vue'
import axios from 'axios';

export const store = reactive({
    urlBackend: "http://localhost:8000/api/",

    user: {
        apartments: [],
        id: 0,
        getUser() {
            this.id = 0;
            axios.get(`${store.urlBackend}user`)
                .then((res) => {
                    this.fillUser(res.data)
                })
                .catch((err) => {
                    this.id = null;
                    console.log(err.response.data);
                })
        },
        fillUser(data) {
            this.id = data.user.id;
            this.name = data.user.name;
            this.surname = data.user.surname;
            this.email = data.user.email;
            this.email_verified_at = data.user.email_verified_at;
            this.admin = data.user.admin;

            this.apartments = data.apartments;
        },
        getApartments() {
            axios.get(`${store.urlBackend}userapartments`).then((res) => {
                this.apartments = res.data.apartments
                console.log(this.apartments)
            }).catch((err) => {
                console.log(err)
            })
        }
    },

    options: {},

    loading: {
        state: false,
        on() {
            this.state = true;
        },
        off() {
            this.state = false;
        }
    },

    apartment: {
        current: null,
        async getAll() {
            return await axios.get(`${store.urlBackend}apartments`)
                .then((res) => {
                    return res.data.apartments
                })
                .catch((err) => {
                    console.log(err.response.data);
                    return err.response.data
                })
        }
    },

    validateString(text, min = 3, max = 254) {
        return text.length <= max && text.length >= min ? true : false;
    },
    validateInteger(number, min = 1, max = 254) {
        return number <= max && number >= min && number % 1 == 0 ? true : false;
    },
    validateBoolean(bool) {
        return bool == "0" || bool == "1" || bool == 0 || bool == 1 ? true : false;
    },
    validateDecimal(number, min = 1, max = 9999.99) {
        return number <= max && number >= min ? true : false;
    },



})