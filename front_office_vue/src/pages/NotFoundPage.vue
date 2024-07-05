<template>
    <main class="d-flex align-items-center justify-content-center">
        <div class="py-5">
            <img src="../../public/img/not_found.svg" alt="404 error not found">
        </div>
    </main>
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

<style></style>