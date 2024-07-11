<template>
  <div class="flip-card mb-5">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <p class="title">{{ promotion.title }}</p>
      </div>
      <div class="flip-card-back">
        <p class="title">{{ promotion.description }}</p>
        <p class="price">€ {{ promotion.price }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    promotion: {
      type: Object,
      required: true,
    }
  },
  methods: {
  },
  data() {
    return {
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
  cursor: pointer;
}

.title {
  font-size: 1.0em;
  font-weight: 900;
  text-align: center;
  margin: 0;
  padding: 6px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.rotate .flip-card-inner {
  transform: rotateY(180deg);

}

.flip-card-front,
.flip-card-back {
  box-shadow: 0 8px 14px 0 rgba(0, 0, 0, 0.2);
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
  background: linear-gradient(120deg, bisque 60%, rgb(255, 231, 222) 88%,
      rgb(255, 211, 195) 40%, rgba(255, 127, 80, 0.603) 48%);
  color: coral;
}

.flip-card-back {
  background: linear-gradient(120deg, rgb(255, 174, 145) 30%, coral 88%,
      bisque 40%, rgb(255, 185, 160) 78%);
  color: white;
  transform: rotateY(180deg);

}
.price {
  font-weight: bold;
  font-size: 30px;
  margin-top: 20px;

}
</style>