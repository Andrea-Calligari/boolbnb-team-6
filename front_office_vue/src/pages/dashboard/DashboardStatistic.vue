<template>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-auto" v-if="apartment">
                <h1>{{ apartment.title }}</h1>
                <p class="text-secondary">{{ apartment.address }}</p>
            </div>
            <div class="col">
                <div class="text-end">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="radio-btn" id="giornaliero" autocomplete="off"
                            checked>
                        <label class="btn btn-outline-warning" @click="parseViews(10)" for="giornaliero">Giorni</label>

                        <input type="radio" class="btn-check" name="radio-btn" id="mensile" autocomplete="off">
                        <label class="btn btn-outline-warning" @click="parseViews(7)" for="mensile">Mesi</label>

                        <input type="radio" class="btn-check" name="radio-btn" id="annuale" autocomplete="off">
                        <label class="btn btn-outline-warning" @click="parseViews(4)" for="annuale">Anni</label>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div id="grafics">

            </div>
        </div>
    </div>
</template>

<script>
import Chart from 'chart.js/auto';
import axios from 'axios';
import { store } from '../../store.js'
export default {
    props: {
        slug: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            store,
            apartment: null,
            views: [],
            data: [],
            totalViews: []
        }
    },
    //sommare tutte le visualizzazioni di una determinata data
    methods: {
        parseViews(sliceNumber = 10) {
            this.data = [];
            this.totalViews = [];
            for (let i = 0; i < this.views.length; i++) {
                const day = this.views[i].viewed_at.slice(0, sliceNumber)
                if (!this.data.includes(day)) {
                    this.data.push(day)
                }
            }

            this.data.sort()

            for (let i = 0; i < this.data.length; i++) {
                let count = 0
                for (let y = 0; y < this.views.length; y++) {
                    if (this.data[i] === this.views[y].viewed_at.slice(0, sliceNumber)) {
                        count++
                    }
                }
                this.totalViews.push(count);
            }

            const grafics = document.getElementById('grafics');

            grafics.innerHTML = '<canvas id="acquisitions"></canvas>'

            const typeStatics = {
                '10': 'line',
                '7': 'polarArea',
                '4': 'doughnut',
            }
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
                let dataParsed = []
                this.data.forEach(dataX => {
                    dataParsed.push(months[dataX.slice(5)])
                });
                this.data = dataParsed;

            }

            new Chart(
                document.getElementById('acquisitions'),
                {
                    type: typeStatics[sliceNumber],
                    data: {
                        labels: this.data,
                        datasets: [
                            {
                                label: 'Views',
                                data: this.totalViews
                            }
                        ]
                    }
                }
            );

        }

    },

    mounted() {
        this.store.loading.on();
        axios.get(`http://localhost:8000/api/apartments/${this.slug}/data`).then((res) => {
            this.apartment = res.data.apartment;
            this.views = this.apartment.views;
            this.parseViews();
            this.store.loading.off();
        }).catch((err) => {
            this.store.loading.off();
            this.$router.push({ name: 'not-found' });
            console.log(err)
        })


    }
}


</script>

<style lang="scss" scoped></style>