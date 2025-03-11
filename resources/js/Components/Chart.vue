<template>
    <div class="w-100 mx-auto shadow p-4">
        <BarChart :chart-data="chartData" :chart-options="chartOptions" />
    </div>
</template>

<script setup>
import { Chart, registerables } from 'chart.js';
import { BarChart } from 'vue-chart-3';

Chart.register(...registerables)
defineProps({
    chartData: Object,
    chartOptions: Object
})

</script>