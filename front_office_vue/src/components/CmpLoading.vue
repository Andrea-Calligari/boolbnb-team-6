<template>
  <div class="vh-100 vw-100 bg-dark_ms position-absolute top-0 start-0 " style="z-index: 999;">
    <div class="position-absolute top-50 start-50 translate-middle text-center">


      <section class="loader mx-auto">
        <div>
          <div>
            <span class="one h6"></span>
            <span class="two h3"></span>
          </div>
        </div>

        <div>
          <div>
            <span class="one h1"></span>
          </div>
        </div>

        <div>
          <div>
            <span class="two h2"></span>
          </div>
        </div>
        <div>
          <div>
            <span class="one h4"></span>
          </div>
        </div>

      </section>

      <h2 class="dark-yellow-font"><span class="dark-blue-font">S</span>tay<span class="dark-blue-font">H</span>ub</h2>
    </div>

  </div>


</template>

<script>
</script>


<style lang="scss" scoped>
@import '../assets/scss/partials/variables.scss';

.bg-dark_ms {
  background: rgba(0, 0, 0, 0.8);
}

.loader {
  display: flex;
  justify-content: center;
  align-items: center;
  /* Add these properties to position the loader properly */
  position: relative;
  width: 90px;
  height: 103px;
  /* Adjust the height to accommodate the "h4" span */
}

.loader div {
  position: absolute;
  width: 50px;
  height: 31px;
}

.rot {
  transform: rotate(150deg);
}

.rot2 {
  transform: rotate(20deg);
}

.loader div:nth-of-type(2) {
  transform: rotate(60deg);
}

.loader div:nth-of-type(3) {
  transform: rotate(-60deg);
}

.loader div div {
  width: 100%;
  height: 100%;
  position: relative;
}

.loader div div span {
  position: absolute;
  width: 4px;
  height: 0%;
  background: $light-yellow;
  z-index: 999999;
}

.h1 {
  left: 0;
  animation: load1 3.2s ease infinite;
}

.h2 {
  right: 0;
  animation: load2 3.2s ease 0.4s infinite;
}

.h3 {
  right: 0;
  animation: load3 3.2s ease 0.8s infinite;
}

.h4 {
  top: 10px;
  left: 23px;
  animation: load4 3.2s ease 1s infinite;
  transform: rotate(90deg);
}

.h5 {
  bottom: 0;
  animation: load5 3.2s ease 1.2s infinite;
}

.h6 {
  left: 0;
  animation: load6 3.2s ease 1.3s infinite;
}

@keyframes load1 {
  0% {
    bottom: 0;
    height: 0;
  }

  6.944444444% {
    bottom: 0;
    height: 100%;
  }

  50% {
    top: 0;
    height: 100%;
  }

  59.944444433% {
    top: 0;
    height: 0;
  }

  /*   91.6666667%{top:0;height:0%;} */
}

@keyframes load2 {
  0% {
    top: 0;
    height: 0;
  }

  6.944444444% {
    top: 0;
    height: 100%;
  }

  50% {
    bottom: 0;
    height: 100%;
  }

  59.944444433% {
    bottom: 0;
    height: 0;
  }

  /*   91.6666667%{bottom:0;height:0%} */
}

@keyframes load3 {
  0% {
    top: 0;
    height: 0;
  }

  6.944444444% {
    top: 0;
    height: 100%;
  }

  50% {
    bottom: 0;
    height: 100%;
  }

  59.94444443% {
    bottom: 0;
    height: 0;
  }

  /*   91.6666667%{bottom:0;height:0%;} */
}

@keyframes load4 {
  0% {
    top: 37px;
    left: 23px;
    height: 134%;
  }

  6.944444444% {
    top: 10px;
    height: 134%;
  }

  50% {
    bottom: 10px;
    height: 134%;
  }

  59.94444443% {
    bottom: 0;
    height: 0;
  }

  /*   91.6666667%{bottom:0;height:0%;} */
}

@keyframes load5 {
  0% {
    bottom: 0;
    height: 0;
  }

  6.944444444% {
    bottom: 0;
    height: 100%;
  }

  50% {
    top: 0;
    height: 100%;
  }

  59.94444443% {
    top: 0;
    height: 0;
  }

  /*   91.6666667%{top:0;height:0%;} */
}

@keyframes load6 {
  0% {
    bottom: 0;
    height: 0;
  }

  6.944444444% {
    bottom: 0;
    height: 100%;
  }

  50% {
    top: 0;
    height: 100%;
  }

  59.94444443% {
    top: 0;
    height: 0;
  }

  /*   91.6666667%{top:0;height:0%;} */
}
</style>