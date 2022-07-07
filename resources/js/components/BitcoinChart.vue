<template>
    <LineChartGenerator
        v-if="loaded"
        ref="linechart"
        :chart-data="chartData"
        :chart-id="chartId"
        :dataset-id-key="datasetIdKey"
        :plugins="plugins"
        :css-classes="cssClasses"
        :styles="styles"
        :width="width"
        :height="height"
        :chart-options="chartOptions"

    />
</template>

<script>
import {Line as LineChartGenerator} from 'vue-chartjs'

import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    LineElement,
    LinearScale,
    CategoryScale,
    PointElement
} from 'chart.js'

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    LineElement,
    LinearScale,
    CategoryScale,
    PointElement
)

export default {
    name: 'BitcoinChart',
    components: {
        LineChartGenerator
    },
    props: {
        chartId: {
            type: String,
            default: 'line-chart'
        },
        datasetIdKey: {
            type: String,
            default: 'label'
        },
        width: {
            type: Number,
            default: 400
        },
        height: {
            type: Number,
            default: 400
        },
        cssClasses: {
            default: '',
            type: String
        },
        styles: {
            type: Object,
            default: () => {
            }
        },
        plugins: {
            type: Array,
            default: () => []
        }
    },
    data: () => ({
        loaded: false,
        chartData: null,
        chartOptions: {
            responsive: true,
            maintainAspectRatio: false
        }
    }),
    async mounted() {
        this.loaded = false

        try {
            const chartDataAPI = await axios.get('/chartData')
            this.chartData = chartDataAPI.data
            this.loaded = true
        } catch (e) {
            console.error(e)
        }
    }
}
</script>
