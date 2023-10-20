<script setup>
import { ref, inject } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Submenu from "@/Components/Submenu.vue"
import Header from "@/Components/Header.vue"

const props = defineProps({
    title: String,

    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <Head :title="title" />

    <div class="wrapper">
        <div class="top">
            <Header />

            <Submenu class="submenu" />
            <Banner image="/images/calculation.webp" class="top-banner">{{ title }}</Banner>

            <main class="content">
                <slot />
            </main>
        </div>
    </div>
</template>

<style>
    .top-banner {
        width: 100%;
        height: 50%;

        margin-bottom: 5px;
    }
</style>
