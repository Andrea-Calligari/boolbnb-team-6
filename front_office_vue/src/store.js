import { reactive } from 'vue'
import axios from 'axios';

export const store = reactive({
    user: {
        id: 0,
        getUser() {
            this.id = 0;
            axios.get("http://localhost:8000/api/user")
                .then((res) => {
                    this.id = res.data.id;
                    this.name = res.data.name;
                    this.surname = res.data.surname;
                    this.email = res.data.email;
                    this.email_verified_at = res.data.email_verified_at;
                    this.admin = res.data.admin;
                })
                .catch((err) => {
                    this.id = null;
                    console.log(err.response.data);
                })
        }
    },
    
    loading: {
        state: true,
        on() {
            this.state = true;
        },
        off() {
            this.state = false;
        }
    },

    options:{},

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