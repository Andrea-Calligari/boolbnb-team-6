<template>

    <main v-if="!isDashboard()" class="main">
        <RouterView />
    </main>

    <main v-else class="main d-flex">
        <aside class="text-white p-3 d-flex flex-column bg-dark bg-opacity-75">
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
main {
    flex-grow: 1;
}

aside {
    width: 150px;
}
</style>