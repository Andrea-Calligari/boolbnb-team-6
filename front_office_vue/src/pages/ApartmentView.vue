<template>
    <div class="container" v-if="apartment">
        <h1>{{ apartment.title }}</h1>
        <p>{{ apartment.address }}</p>
    </div>
    
</template>

<script>
import axios from 'axios';
export default {
    props: {
        slug: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            
            apartment: null
        }
    },
    mounted() {
        console.log(this.$route.params.slug);
        axios.get(`http://127.0.0.1:8000/api/apartments/${this.slug}`).then((res) => {
            console.log(res.data.results[0]);
            this.apartment = res.data.results[0];
        }).catch((err) => {
            console.log(err)    
        })
        
    }
}
</script>

<style lang="scss" scoped></style>