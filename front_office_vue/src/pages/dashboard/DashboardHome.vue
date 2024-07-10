<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h2 class="pt-3">Migliori appartamenti</h2>
      </div>
      <div class="col" v-if="bestApartments.length > 0" v-for="(apartment, i) in bestApartments">
        <div class="ms_card">
          <div class="content">
            <h2>{{ i + 1 }}</h2>
            <p>{{ apartment.title }}</p>
          </div>
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
              <div class="accordion-body">
                <p>email: {{ message.sender_email }}</p>
                <p>messaggio: {{ message.text }}</p>
              </div>
              <a :href="`mailto:${message.sender_email}`" class="btn btn-primary">Rispondi a {{ message.name
                }}</a>
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
      <!-- <div class="col-12" v-if="views.length > 0"> -->
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
        <div id="grafics"></div>
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
      bestApartments: [],
      lastMessages: [],
      views: {}
    }
  },
  methods: {
    parseViews(sliceNumber = 10) {


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

      // let dataParsed = []
      // labData.forEach(dataX => {
      //   dataParsed.push(months[dataX.slice(5)])
      // });
      // labData = dataParsed;

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
      // sorting apartments per views
      this.store.user.apartments.sort((a, b) => -(a.views.length - b.views.length))
      // push i 3 best apartment 
      for (let index = 0; index < this.store.user.apartments.length; index++) {
        this.bestApartments.push(this.store.user.apartments[index]);
        if (index >= 2) {
          index = this.store.user.apartments.length;
        }
      }

      let messages = []
      this.store.user.apartments.forEach(apartment => {
        apartment.messages.forEach(message => {
          messages.push(message)
        });
      });
      messages.sort((a, b) => -(a.id - b.id))

      // push i 3 last messages
      for (let index = 0; index < messages.length; index++) {
        messages[index].titleApartment = store.user.apartments.find((e) => e.id === messages[index].apartment_id).title
        this.lastMessages.push(messages[index]);
        if (index >= 2) {
          index = messages.length;
        }
      }
      // console.log(this.lastMessages);

      this.store.user.apartments.forEach(apartment => {
        apartment.views.forEach(view => {
          const data = view.viewed_at.slice(0, 10);
          if (this.views[data]) {
            this.views[data] = this.views[data] + 1
          } else {
            this.views[data] = 1
          }
        });
      });
      // console.log(this.views);
      this.parseViews();

      this.store.loading.off()
    }).catch((err) => {
      this.store.loading.off();
      this.$router.push({ name: 'home' });
      console.log(err)
    })
  }
}
</script>


<style lang="scss" scoped>
.ms_card {
  width: 190px;
  height: 254px;
  background: #07182E;
  position: relative;
  display: flex;
  place-content: center;
  place-items: center;
  overflow: hidden;
  border-radius: 20px;

  color: white;

  .content {
    padding: 15px;
    ;
    z-index: 1;
    text-align: center;
  }
}


.ms_card::before {
  content: '';
  position: absolute;
  width: 100px;
  background-image: linear-gradient(180deg, rgb(0, 183, 255), rgb(255, 48, 255));
  height: 130%;
  animation: rotBGimg 3s linear infinite;
  transition: all 0.2s linear;
}

@keyframes rotBGimg {
  from {
    transform: rotate(0deg);
  }

  to {
    transform: rotate(360deg);
  }
}

.ms_card::after {
  content: '';
  position: absolute;
  background: #07182E;
  ;
  inset: 5px;
  border-radius: 15px;
}

/* .card:hover:before {
  background-image: linear-gradient(180deg, rgb(81, 255, 0), purple);
  animation: rotBGimg 3.5s linear infinite;
} */
</style>