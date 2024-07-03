<template>
    <div class="container">
        <div class="row row-cols-2">
            <template v-for="category in categories">
                <p>{{ category.name }}</p>
            </template>

        </div>
    </div>
</template>

<script>
import { store } from '../../store.js';
export default {
    data() {
        return {
            store,
            categories: []
        }
    },

    methods: {
    },
    mounted() {

        this.store.category.getAll().then((res) => {

            this.categories = res
        })

    }
}
</script>

<style lang="scss" scoped></style>