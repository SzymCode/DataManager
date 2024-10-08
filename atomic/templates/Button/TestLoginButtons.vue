<template>
    <div class="test-buttons-container">
        <ad-button
            icon="pi pi-user-edit"
            @click="testLogin('admin')"
            :rounded="true"
            v-tooltip.top="'Test Admin login'"
        />
        <ad-button
            icon="pi pi-user"
            severity="secondary"
            @click="testLogin('user')"
            :rounded="true"
            v-tooltip.top="'Test User login'"
        />
    </div>
</template>

<script setup lang="ts">
import { testLogin } from 'atomic/bosons/utils'
</script>
