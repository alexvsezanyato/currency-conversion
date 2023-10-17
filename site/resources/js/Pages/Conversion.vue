<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CurrencyConverter from '@/Components/CurrencyConverter.vue'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    currencies: Object,
});
</script>

<template>
    <AppLayout
        title="Конвертер валют"
        :canLogin="canLogin"
        :canRegister="canRegister"
    >
        <CurrencyConverter :currencies="currencies" />
    </AppLayout>
</template>
