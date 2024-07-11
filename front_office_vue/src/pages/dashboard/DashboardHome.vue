<template>
  <div class="container-fluid">
    <div class="row me-2">
      <div class="col-12">
        <h2 class="pt-3">Appartamenti</h2>
      </div>

      <div class="col-6 col-md-3 col-xl-2 mb-3">
        <div class="ms_card">
          <RouterLink :to="{ name: 'apartments.create' }" class="content">
            <div class="content-border"></div>
            <p class="mb-0" style="font-size: calc(7 * 100%); line-height: 50%;">+</p>
          </RouterLink>
        </div>
      </div>

      <div class="col-6 col-md-3 col-xl-2 mb-3" v-if="bestApartments.length > 0"
        v-for="(apartment, i) in bestApartments">
        <div class="ms_card">
          <img class="bg-1"
            :src="apartment.image.split(',')[0] ? 'http://localhost:8000/' + apartment.image.split(',')[0] : 'http://localhost:8000/uploads/apartment/img_default/null.png'">
          <div class="line-container">
            <div class="line-around"></div>
          </div>

          <RouterLink :to="{ name: 'apartments.show', params: { slug: apartment.slug } }" class="content">

            <img class="bg-1 bg-inset"
              :src="apartment.image.split(',')[0] ? 'http://localhost:8000/' + apartment.image.split(',')[0] : 'http://localhost:8000/uploads/apartment/img_default/null.png'">

            <img class="best-ico" :src="bestIco[i]" alt="">
            <p class="title mb-0">{{ apartment.title }}</p>

          </RouterLink>
        </div>
      </div>
      <div class="col-12" v-else>
        <h4>Non hai appartamenti.</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h2 class="pt-3">Ultimi messaggi</h2>
      </div>
      <div class="col-12" v-if="lastMessages.length > 0">
        <div class="accordion" id="accordionExample">

          <div class="accordion-item" v-for="(message, i) in lastMessages">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                :data-bs-target="`#collapse${i}`" aria-expanded="false" :aria-controls="`collapse${i}`">
                Da: {{ message.name }} {{ message.surname }} per l'annuncio {{ message.titleApartment }}
              </button>
            </h2>
            <div :id="`collapse${i}`" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body container-fluid">

                <div class="row">
                  <div class="col-12 col-md">
                    <p class="">email: {{ message.sender_email }}</p>
                    <p>messaggio: {{ message.text }}</p>
                  </div>
                  <div class="col-12 col-md-auto">
                    <a :href="`mailto:${message.sender_email}`" class="btn btn-outline-dark">
                      <span class="material-symbols-sharp">
                        outgoing_mail
                      </span>
                    </a>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-12" v-else>
        <h4>Non hai messaggi.</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <h2 class="pt-3">Views appartamenti</h2>
      </div>
      <!-- <div class="col-12" v-if="views"> -->
      <div class="col-12">
        <div class="text-end">
          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="radio-btn" id="giornaliero" autocomplete="off" checked>
            <label class="btn btn-outline-warning" @click="parseViews(10)" for="giornaliero">Giorni</label>

            <input type="radio" class="btn-check" name="radio-btn" id="mensile" autocomplete="off">
            <label class="btn btn-outline-warning" @click="parseViews(7)" for="mensile">Mesi</label>

            <input type="radio" class="btn-check" name="radio-btn" id="annuale" autocomplete="off">
            <label class="btn btn-outline-warning" @click="parseViews(4)" for="annuale">Anni</label>
          </div>
        </div>

        <div class="scroll-container">
          <div id="grafics" style="min-width: 1000px;" :class="sliceN !== 10 ? 'day-s' : ''"></div>
        </div>
      </div>
      <!-- <div class="col-12" v-else>
        <h4>Non hai Views.</h4>
      </div> -->
    </div>
  </div>
</template>


<script>
import Chart from 'chart.js/auto';
import { store } from '../../store.js';
export default {
  data() {
    return {
      store,
      sliceN: 10,
      bestApartments: [],
      lastMessages: [],
      views: null,
      bestIco: [
        '/img/b_views.svg',
        '/img/b_price.svg',
        '/img/b_services.svg'
      ]
    }
  },
  methods: {
    parseViews(sliceNumber) {

      this.sliceN = sliceNumber;
      console.log(this.sliceN);
      let ArrViews = [];
      let ArrLabels = [];
      let ArrSumViews = [];

      if (sliceNumber < 10) {
        let parsedViews = {};
        for (const key in this.views) {
          const newData = key.slice(0, sliceNumber);
          if (parsedViews[newData]) {
            parsedViews[newData] = parsedViews[newData] + this.views[key];
          } else {
            parsedViews[newData] = this.views[key];
          }
        }
        for (const key in parsedViews) {
          ArrViews.push([key, parsedViews[key]]);
        }
      } else {
        for (const key in this.views) {
          ArrViews.push([key, this.views[key]]);
        }
      }

      ArrViews.sort();
      ArrViews.forEach(e => {
        const fullY = e[0].slice(0, 4)
        const y = e[0].slice(2, 4)
        const m = e[0].slice(5, 7)
        const d = e[0].slice(8, 10)

        if (sliceNumber === 7) {
          const months = {
            '01': 'gennaio',
            '02': 'febbraio',
            '03': 'marzo',
            '04': 'aprile',
            '05': 'maggio',
            '06': 'giugno',
            '07': 'luglio',
            '08': 'agosto',
            '09': 'settembre',
            '10': 'ottobre',
            '11': 'novembre',
            '12': 'dicembre'
          }
          ArrLabels.push(`${months[m]} - ${y}`);
        } else if (sliceNumber === 4) {
          ArrLabels.push(fullY);
        } else {
          ArrLabels.push(`${d}/${m}/${y}`);
        }
        ArrSumViews.push(e[1]);
      });

      const grafics = document.getElementById('grafics');
      grafics.innerHTML = '<canvas id="acquisitions"></canvas>'
      const typeStatics = {
        '10': 'line',
        '7': 'polarArea',
        '4': 'doughnut',
      }
      new Chart(
        document.getElementById('acquisitions'),
        {
          type: typeStatics[sliceNumber],
          data: {
            labels: ArrLabels,
            datasets: [
              {
                label: 'Views',
                data: ArrSumViews
              }
            ]
          }
        }
      );
    }
  },
  computed: {
  },
  mounted() {
    this.store.loading.on();
    this.store.user.getApartments().then((res) => {

      if (this.store.user.apartments.length > 0) {
        this.store.user.apartments.sort((a, b) => -(a.views.length - b.views.length))
        this.bestApartments.push(this.store.user.apartments[0]);
        this.store.user.apartments.sort((a, b) => a.price - b.price)
        this.bestApartments.push(this.store.user.apartments[0]);
        this.store.user.apartments.sort((a, b) => -(a.services.length - b.services.length))
        this.bestApartments.push(this.store.user.apartments[0]);

        this.store.user.apartments.sort((a, b) => -(a.id - b.id))

        for (let index = 0; index < this.store.user.messages.length; index++) {
          this.lastMessages.push(this.store.user.messages[index]);
          if (index >= 2) {
            index = this.store.user.messages.length;
          }
        }
        this.store.user.apartments.forEach((apartment) => {
          apartment.views.forEach(view => {
            if (view) {
              if (!this.views) {
                this.views = {};
              }
              const data = view.viewed_at.slice(0, 10);
              if (this.views[data]) {
                this.views[data] = this.views[data] + 1
              } else {
                this.views[data] = 1
              }
            }

          });
        });
        this.parseViews(10);
      } else {
        this.store.loading.off()
      }

    }).catch((err) => {
      this.store.loading.off();
      this.$router.push({ name: 'home' });
      console.log(err)
    })
  },
  updated() {
    if (this.sliceN === 10) {
      this.parseViews(10);
    }
    this.store.loading.off()
  }
}
</script>


<style lang="scss" scoped>
@use '../../assets/scss/partials/_variables.scss' as *;

.day-s {
  min-width: 100% !important;
}


.ms_card {
  width: 100%;
  aspect-ratio: 2/3;
  background: $dark-blue;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;

  .line-container {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;

    .line-around {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 60px;
      background-image: linear-gradient(180deg, $light-yellow, $light-yellow );
      height: 130%;
      animation: rotBGimg 3s linear infinite;
      // transition: all 0.2s linear;
    }
  }

  .bg-1 {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    top: 0;
    left: 0;
  }



  .content {
    text-align: center;
    color: rgb(255, 255, 255);
    z-index: 1;
    width: 100%;
    overflow: hidden;
    padding-bottom: 0;
    transition: all 0.5s;

    &:hover .bg-inset {
      filter: blur(0px);
    }

    .title {
      padding: 10px;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .title:hover {
      background-color: rgba(255, 255, 255, 0.7);
      color: black;
      cursor: pointer;
    }

    .bg-inset {
      width: calc(100% - 4px);
      height: calc(100% - 4px);
      margin: 2px;
      filter: blur(2px);
      z-index: -1;
    }

    .bg-inset:hover {
      filter: blur(0);
    }

    .best-ico {
      position: absolute;
      top: 0;
      right: 0;
      transform: translate(20%, -20%);
      width: 50%;
    }
  }

  &:hover {
    .content-border {
      background: hsla(0, 0%, 100%, 0.3);
      filter: blur(10px);
    }
  }

  .content-border {
    height: calc(100% - 12px);
    width: calc(100% - 12px);
    margin: 6px;
    border: 6px solid #fff;
    position: absolute;
    top: 0;
    left: 0;
    transition: all 0.5s;
  }
}

@keyframes rotBGimg {
  from {
    transform: translate(-50%, -50%) rotate(0deg);
  }

  to {
    transform: translate(-50%, -50%) rotate(360deg);
  }
}

.scroll-container {
  overflow-x: auto;
  white-space: nowrap;
  width: calc(100vw - 200px);
}
</style>