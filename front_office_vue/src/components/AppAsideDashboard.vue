<template>

  <RouterLink :to="{ name: 'apartments.create' }" class="btn btn-primary mb-3">
    Aggiungi un nuovo appartamento
  </RouterLink>


  <RouterLink :to="{ name: 'dashboard.userapartments' }" class="btn btn-primary mb-3">
    I miei appartamenti
  </RouterLink>

  <RouterLink :to="{ name: 'dashboard.profileupdate' }" class="btn btn-primary mb-3">
    Aggiorna profilo
  </RouterLink>

  <RouterLink :to="{ name: 'dashboard.receivedmessages' }" class="btn btn-primary mb-3">
    messaggi ricevuti
  </RouterLink>

  

</template>