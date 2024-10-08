<template>
    <invisible-recaptcha
        :sitekey="captchaKey || sitekey"
        :validate="props.validate"
        :callback="props.callback"
        :type="props.type"
        :id="props.id"
        :disabled="props.disabled"
    />
</template>

<script setup lang="ts">
import { captchaKey } from 'atomic/bosons/constants'
import { InvisibleRecaptchaInterface } from 'atomic/bosons/types'

const props = defineProps<InvisibleRecaptchaInterface>()
</script>
