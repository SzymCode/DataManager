<template>
    <welcome-navbar></welcome-navbar>
    <div class="welcomeContainer">
        <start />
        <features />
        <welcome-footer />
    </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'

import Start from './Start.vue'
import Features from './Features/Features.vue'
import WelcomeFooter from './WelcomeFooter.vue'

import { useDisplayCharts } from '@/utils'

import { useColors } from 'atomic/bosons/utils'

const { setDefaultColors } = useColors()
const { setDefaultChartsDisplay } = useDisplayCharts()

onMounted(() => {
    setDefaultColors(true)
    setDefaultChartsDisplay()
})
</script>
