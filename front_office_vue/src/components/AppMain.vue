<template>

    <main v-if="!isDashboard()" class="main">
        <RouterView />
    </main>

    <main v-else class="main d-flex">
        <aside class="flex-shrink-0 d-flex flex-column">
            <AppAsideDashboard />
        </aside>
        <div class="main-dashbord flex-grow-1">
            <RouterView />
        </div>
    </main>
</template>

<script>
import AppAsideDashboard from './AppAsideDashboard.vue'
export default {
    components: { AppAsideDashboard },
    methods: {
        isDashboard() {
            const ArrPath = this.$route.fullPath.split("/");
            if (ArrPath[1]) {
                if (ArrPath[1] === 'dashboard') {
                    return true
                } else {
                    return false
                }
            } else {
                return false
            }

        }
    }
}
</script>


<style lang="scss" scoped>
@use '../assets/scss/partials/_variables.scss' as *;

main {
    flex-grow: 1;
}

aside {
    width: 150px;
    background-image: url('../../public/img/bg-prova.png');
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 16px;
}

@media screen and (max-width: 576px) {
    aside {
        display: none !important;
    }
}
</style>