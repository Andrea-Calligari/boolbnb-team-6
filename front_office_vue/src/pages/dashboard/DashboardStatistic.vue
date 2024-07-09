<template>
    <div>
        <div style="width: 800px;"><canvas id="acquisitions"></canvas></div>
    </div>
</template>

<script>
import Chart from 'chart.js/auto';
import axios from 'axios';
export default {
    props: {
        slug: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            //apartment:null,
            views: [],
            data: [],
            totalViews: []
        }
    },
    //sommare tutte le visualizzazioni di una determinata data
    methods: {
        parseViews() {
            for (let i = 0; i < this.views.length; i++) {
                const day = this.views[i].viewed_at.slice(0, 10)
                if (!this.data.includes(day)) {
                    this.data.push(day)
                }
            }

            this.data.sort()
            console.log(this.data)

            for (let i = 0; i < this.data.length; i++) {
                let count = 0
                for (let y = 0; y < this.views.length; y++) {
                    if (this.data[i] === this.views[y].viewed_at.slice(0, 10)) {
                        count++
                    }
                }
                this.totalViews.push(count);
            }

            console.log(this.totalViews);




            new Chart(
                document.getElementById('acquisitions'),
                {
                    type: 'line',
                    data: {
                        labels: this.data,
                        datasets: [
                            {
                                label: 'Acquisitions by year',
                                data: this.totalViews
                            }
                        ]
                    }
                }
            );

        }

    },

    mounted() {



        axios.get(`http://localhost:8000/api/apartments/${this.slug}/data`).then((res) => {

            // console.log(res.data.results[0]);
            //this.apartment = res.data.apartment;
            this.views = res.data.apartment.views
            //console.log(this.views)

            this.parseViews()

        }).catch((err) => {
            this.$router.push({ name: 'not-found' });
            console.log(err)
        })


    }
}


</script>

<style lang="scss" scoped></style>