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
    // background-image: url('https://th.bing.com/th/id/R.3f4d463ea85f19df7350b11bdf140132?rik=W4oOheJbg%2bGB9w&riu=http%3a%2f%2fwooddesignroma.com%2fwp-content%2fuploads%2f2017%2f11%2fciliegio-1.jpg&ehk=vt11%2fsB4id9zVnJ9hyTUKl286krNRUs%2bWJniPIiw9rU%3d&risl=&pid=ImgRaw&r=0');
    padding: 16px;

    
}

@media screen and (max-width: 576px) {
    aside {
        display: none !important;
    }
}
</style>