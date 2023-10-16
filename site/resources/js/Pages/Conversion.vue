<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CurrencyList from '@/Components/CurrencyList.vue'

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
        <CurrencyList :currencies="currencies" />
    </AppLayout>
</template>
