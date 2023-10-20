<script setup>
    import { ref } from 'vue'
    import { Chart } from 'highcharts-vue'

    const props = defineProps({
        title: String,
        series: Array,
    })

    const title = {
        text: props.title,
    }

    const yAxis = {
        title: {
            text: props.title,
        }
    }

    const xAxis = {
        min: 0,
        max: 10,

        labels: {
            step: 1,
        },

        tickWidth: 1,
        tickInterval: 1,
    }

    const options = ref({
        title: title,
        yAxis: yAxis,
        xAxis: xAxis,

        series: props.series,

        ...props.options,
    })
</script>

<template>
    <div>
        <Chart :options="options" class="chart" />
    </div>
</template>
