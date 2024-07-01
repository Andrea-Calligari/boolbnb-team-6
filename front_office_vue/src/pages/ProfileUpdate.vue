<template>
   
</template>

<script>

import { store } from '../store';
    export default {
        data(){
            return{
                store,
            }
        },
        
        mounted(){
            this.store.user.getApartments()
        }
    }
</script>

<style lang="scss" scoped>

</style>