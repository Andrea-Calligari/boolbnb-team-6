<template>
    <div class="flip-card">
    <div class="flip-card-inner">
        <div class="flip-card-front">
            <p class="title">{{ promotion.title }}</p>
        </div>
        <div class="flip-card-back">
            <p class="title">{{ promotion.description }}</p>
            <p>{{ promotion.price }}</p>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: {
            promotion:{
                type : Object,
                required: true,
            }
        }
    }
</script>

<style lang="scss" scoped>
@use '../assets/scss/partials/_variables.scss' as *;


.flip-card {
  background-color: transparent;
  width: 190px;
  height: 254px;
  perspective: 1000px;
//   font-family: sans-serif;
    cursor: pointer;
}

.title {
  font-size: 1.5em;
  font-weight: 900;
  text-align: center;
  margin: 0;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  box-shadow: 0 8px 14px 0 rgba(0,0,0,0.2);
  position: absolute;
  display: flex;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  border: 1px solid coral;
  border-radius: 1rem;
}

.flip-card-front {
 background: $light-blue;
    background: radial-gradient(circle, $light-blue 0%, $light-yellow 81%);
}

.flip-card-back {
  background:$light-blue;
background: radial-gradient(circle, $light-blue 0%, $light-yellow 81%);
  transform: rotateY(180deg);
}
</style>