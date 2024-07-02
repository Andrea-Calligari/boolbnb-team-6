<template>
  <button>
    <img v-if="image" :src="'http://localhost:8000/'+image" height="30" width="30" alt="">
    {{content}}
  </button>
</template>

<script>
export default {
  props: ['content','image'],
}
</script>


<style lang="scss" scoped>
button {
  text-decoration: none;
  font-size: 25px;
  border: none;
  background: none;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
}
button:hover {
  opacity: 0.5;
}

button::before {
  margin-left: auto;
}

button::after,
button::before {
  content: '';
  width: 0%;
  height: 2px;
  background: #f44336;
  display: block;
  
}
.loading::after, .loading::before {
  animation-duration: 0.3s;
  animation-name: changewidth;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}


@keyframes changewidth {
  from {
    width: 0px;
  }

  to {
    width: 100%;
  }
}
</style>