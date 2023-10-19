<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CurrencyConverter from '@/Components/CurrencyConverter.vue'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <AppLayout title="Конвертер валют">
        <CurrencyConverter />
    </AppLayout>
</template>
