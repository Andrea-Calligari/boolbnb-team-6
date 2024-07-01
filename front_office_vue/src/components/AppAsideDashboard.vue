<template>
  <RouterLink :to="{ name: 'userapartments' }" class="btn btn-primary mb-3">
    I miei appartamenti
  </RouterLink>

  <RouterLink :to="{ name: 'profileupdate' }" class="btn btn-primary mb-3">
    Aggiorna profilo
  </RouterLink>

  <RouterLink :to="{ name: 'receivedmessages' }" class="btn btn-primary mb-3">
    messaggi ricevuti
  </RouterLink>

</template>