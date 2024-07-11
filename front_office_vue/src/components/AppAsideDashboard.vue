<template>
  <RouterLink :to="{ name: 'dashboard' }" class="mb-3">
    <CmpBtnAside front="dashboard" top="La mia <br> Dashboard" />
  </RouterLink>

  <RouterLink :to="{ name: 'dashboard.userapartments' }" class="mb-3">
    <CmpBtnAside front="roofing" top="I miei <br> annunci" />
  </RouterLink>

  <RouterLink :to="{ name: 'dashboard.profileupdate' }" class="mb-3">
    <CmpBtnAside front="manage_accounts" top="Modifica <br> profilo" />
  </RouterLink>

  <RouterLink :to="{ name: 'dashboard.receivedmessages' }" class="mb-3">
    <CmpBtnAside front="mail" top="Messaggi <br> ricevuti" />
  </RouterLink>

</template>
<script>
import CmpBtnAside from './CmpBtnAside.vue'
export default {
  components: { CmpBtnAside },
}
</script>


<style lang="scss" scoped></style>