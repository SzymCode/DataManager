<template>
    <ColorPicker
        v-model="itemColor"
        :panelClass="panelClass"
        :format="format"
        :defaultColor="defaultColor"
        :inline="inline"
        :disabled="disabled"
        :unstyled="unstyled"
        :tabindex="tabindex"
        :autoZIndex="autoZIndex"
    />
</template>

<script setup lang="ts">
import { watchEffect } from 'vue'

import { ColorPickerInterface } from 'atomic/bosons/types'
import { useColorPicker } from 'atomic/bosons/utils'

const props = defineProps<ColorPickerInterface>()

const { itemColor, setColorValues } = useColorPicker(props.item)

watchEffect(setColorValues)
</script>
