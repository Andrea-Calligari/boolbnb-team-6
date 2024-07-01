<template>
    <main class="main">
        <RouterView />
    </main>
</template>

<script>
// export default {
//     data() {
//         return {
//             store,
//         }
//     },
// }
</script>


<style lang="scss" scoped>
main {
    flex-grow: 1;

    &:has(aside) {
        display: flex;
    }
}
</style>