<template>
   <div class="container mt-4">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               



               <form @submit.prevent="onRegister" class="form_main">
                  <p class="heading">Register</p>
                  <div class="inputContainer">
                     <svg class="inputIcon" viewBox="0 0 18 18" version="1.1" width="16" height="16" fill="#2e2e2e"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 41.2 (35397) - http://www.bohemiancoding.com/sketch -->
                        <title>ic_username</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                           stroke-linecap="round" stroke-linejoin="round">
                           <g id="24-px-Icons" transform="translate(-27.000000, -27.000000)" stroke="#2e2e2e">
                              <g id="ic_username" transform="translate(24.000000, 24.000000)">
                                 <g id="Profile">
                                    <g transform="translate(4.000000, 4.000000)" stroke-width="2">
                                       <circle id="Oval" cx="8" cy="4" r="4"></circle>
                                       <path d="M16,16 C16,11.581722 12.418278,8 8,8 C3.581722,8 0,11.581722 0,16"
                                          id="Oval-2"></path>
                                    </g>
                                 </g>
                              </g>
                           </g>
                        </g>
                     </svg>
                     <input id="name" type="text" class="inputField" v-model="name" :class="store.validate.isV(isVname)"
                        required autocomplete="name" autofocus placeholder="Nome">


                  </div>
                  <div v-if="store.validate.isV(isVname) === 'is-invalid'" class="mt-0 text-danger">
                     Il campo non può essere vuoto e non deve superare i 254 caratteri
                  </div>

                  <div class="inputContainer">
                     <svg class="inputIcon" viewBox="0 0 18 18" version="1.1" width="16" height="16" fill="#2e2e2e"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 41.2 (35397) - http://www.bohemiancoding.com/sketch -->
                        <title>ic_username</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                           stroke-linecap="round" stroke-linejoin="round">
                           <g id="24-px-Icons" transform="translate(-27.000000, -27.000000)" stroke="#2e2e2e">
                              <g id="ic_username" transform="translate(24.000000, 24.000000)">
                                 <g id="Profile">
                                    <g transform="translate(4.000000, 4.000000)" stroke-width="2">
                                       <circle id="Oval" cx="8" cy="4" r="4"></circle>
                                       <path d="M16,16 C16,11.581722 12.418278,8 8,8 C3.581722,8 0,11.581722 0,16"
                                          id="Oval-2"></path>
                                    </g>
                                 </g>
                              </g>
                           </g>
                        </g>
                     </svg>
                     <input id="surname" type="text" class="inputField" v-model="surname"
                        :class="store.validate.isV(isVsurname)" required autocomplete="surname" autofocus
                        placeholder="Cognome">
                    
                  </div>
                  <div v-if="store.validate.isV(isVsurname) === 'is-invalid'" class="mt-0 text-danger">
                        Il campo non può essere vuoto e non deve superare i 254 caratteri
                     </div>

                  <div class="inputContainer">
                     <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2e2e2e"
                        viewBox="0 0 16 16">
                        <path
                           d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z">
                        </path>
                     </svg>
                     <input id="email" type="email" class="inputField" v-model="email"
                        :class="store.validate.isV(isVemail)" required autocomplete="email" placeholder="email">

                     
                  </div>
                  <div v-if="store.validate.isV(isVemail) === 'is-invalid'" class="mt-0 text-danger">
                        Il campo non può essere vuoto e non deve superare i 254 caratteri
                     </div>

                  <div class="inputContainer">
                     <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2e2e2e"
                        viewBox="0 0 16 16">
                        <path
                           d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z">
                        </path>
                     </svg>
                     <input id="password" type="password" class="inputField" v-model="password"
                        :class="store.validate.isV(isVpassword)" required autocomplete="new-password"
                        placeholder="Password">

                    
                  </div>
                  <div v-if="store.validate.isV(isVpassword) === 'is-invalid'" class="mt-0 text-danger">
                        Il campo deve avere almeno 8 caratteri e non può superare i 254 caratteri
                     </div>

                  <div class="inputContainer">
                     <svg class="inputIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#2e2e2e"
                        viewBox="0 0 16 16">
                        <path
                           d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z">
                        </path>
                     </svg>
                     <input id="password-confirm" type="password" class="inputField" v-model="password_confirmation"
                        :class="store.validate.isV(isVpassword_confirmation)" required autocomplete="new-password"
                        placeholder="Ripeti Password">

                  


                  </div>
                  <div v-if="store.validate.isV(isVpassword_confirmation) === 'is-invalid'" class="mt-0 text-danger">
                        Il campo Password e Confirm Password devono essere uguali
                     </div>

                  <div class="inputContainer">
                     <svg class="inputIcon" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="#2e2e2e">
                        <title />
                        <g data-name="Layer 2" id="Layer_2">
                           <path
                              d="M29,8H26V5a1,1,0,0,0-1-1H3A1,1,0,0,0,2,5V23a1,1,0,0,0,1,1H6v3a1,1,0,0,0,1,1H29a1,1,0,0,0,1-1V9A1,1,0,0,0,29,8ZM4,22V6H24V8H7A1,1,0,0,0,6,9V22Zm8-10a2,2,0,1,1-2,2A2,2,0,0,1,12,12ZM25.89,23.46A1,1,0,0,1,25,24H11a1,1,0,0,1-.89-.55,1,1,0,0,1,.09-1.05l3-4a1,1,0,0,1,1.25-.29l1.35.67,3.49-3.49a1,1,0,0,1,.79-.29,1,1,0,0,1,.73.42l5,7A1,1,0,0,1,25.89,23.46Z" />
                        </g>
                     </svg>
                     <input class="inputField" type="file" name="image" value="" id="image">
                  </div>

                  <button id="button">Submit</button>
                  
               </form>


               
            </div>
         </div>
      </div>
   </div>


</template>

<script>
import { store } from '../../store.js';
import axios from 'axios'
axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
export default {
   data() {
      return {
         name: '',
         isVname: null,
         surname: '',
         isVsurname: null,
         email: '',
         isVemail: null,
         password: '',
         isVpassword: null,
         password_confirmation: '',
         isVpassword_confirmation: null,
         store,
         image: null
      }
   },
   methods: {
      isFormValidated() {
         this.isVname = this.store.validate._string(this.name);
         this.isVsurname = this.store.validate._string(this.surname);
         this.isVemail = this.store.validate._string(this.email);
         this.isVpassword = this.store.validate._string(this.password, 8, 254);
         this.isVpassword_confirmation = this.password === this.password_confirmation;
         if (
            this.isVname &&
            this.isVsurname &&
            this.isVemail &&
            this.isVpassword &&
            this.isVpassword_confirmation
         ) {
            return true;
         } else {
            return false;
         }
      },
      async onRegister(e) {
         if (this.isFormValidated()) {
            this.store.loading.on();
            this.store.user.id = 0;
            await axios.get("http://localhost:8000/sanctum/csrf-cookie");
            await axios.post("http://localhost:8000/api/register", {
               name: this.name,
               surname: this.surname,
               email: this.email,
               password: this.password,
               password_confirmation: this.password_confirmation,
               image: e.target.elements["image"].files[0]
            }, {
               headers: {
                  'Content-Type': 'multipart/form-data'
               }
            }).then((res) => {
               this.store.user.getUser();
               this.store.loading.off();
               this.$router.push({ name: 'dashboard' });
            }).catch((err) => {
               this.store.loading.off();
               console.log(err.response.data);
            });
         }
      },
   },
   computed: {
   },
   mounted() {
   }
}
</script>


<style lang="scss" scoped>
$dark-blue: #0081AF;
$blue: #00ABE7;
$light-blue: #2DC7FF;
$light-yellow: #EAD2AC;
$dark-yellow: #eaba6b;

.form_main {
   width: 100%;
   display: flex;
   flex-direction: column;
   align-items: center;
   justify-content: center;
   background-color: white;
   padding: 30px 30px 30px 30px;
   box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.062);
   position: relative;
   overflow: hidden;
}

.form_main::before {
   opacity: 0.3;
   position: absolute;
   content: "";
   width: 450px;
   height: 515px;
   background-color: $light-blue;
   transform: rotate(45deg);
   left: -155px;
   bottom: -36px;
   z-index: 1;
   border-radius: 30px;
   box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.082);
}

.heading {
   font-size: 2em;
   color: #2e2e2e;
   font-weight: 700;
   margin: 5px 0 10px 0;
   z-index: 2;
}

.inputContainer {
   width: 100%;
   position: relative;
   display: flex;
   align-items: center;
   justify-content: center;
   z-index: 2;
}

.inputIcon {
   position: absolute;
   left: 3px;
}

.inputField {
   width: 100%;
   height: 30px;
   background-color: transparent;
   border: none;
   border-bottom: 2px solid rgb(173, 173, 173);
   margin: 10px 0;
   color: black;
   font-size: .8em;
   font-weight: 500;
   box-sizing: border-box;
   padding-left: 30px;
}

.inputField:focus {
   outline: none;
   border-bottom: 2px solid $dark-blue;
}

.inputField::placeholder {
   color: rgba(26, 25, 25, 0.815);
   font-size: 1em;
   font-weight: 500;
}

#button {
   z-index: 2;
   position: relative;
   width: 100%;
   border: none;
   background-color: $dark-blue;
   height: 30px;
   color: white;
   font-size: .8em;
   font-weight: 500;
   letter-spacing: 1px;
   margin: 10px;
   cursor: pointer;
}

#button:hover {
   background-color: $light-blue;
}

.forgotLink {
   z-index: 2;
   font-size: .7em;
   font-weight: 500;
   color: rgb(44, 24, 128);
   text-decoration: none;
   padding: 8px 15px;
   border-radius: 20px;
}
</style>