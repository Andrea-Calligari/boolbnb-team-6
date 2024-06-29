import { reactive } from 'vue'
import axios from 'axios';

export const store = reactive({
    user:{
        id:0,
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
})