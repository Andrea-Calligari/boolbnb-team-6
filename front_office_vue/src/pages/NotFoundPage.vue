<template>
    <div class="text-center">
        <img src="../../public/img/not_found.svg" alt="404 error not found">
        <br>
        <RouterLink :to="{ name: 'home' }" class="btn btn-success btn-lg mb-5">
            Torna alla Home
        </RouterLink>
    </div>


</template>

<script>
export default {
    mounted() {
        console.log('404 page mounted')
    },
    unmounted() {
        console.log('404 page unmounted')
    }
}

</script>

<style lang="scss" scoped>
img {
    width: 100vmin;
    padding: 50px;
    padding-bottom: 0;
}
</style>