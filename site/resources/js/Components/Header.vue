<script setup lang="ts">
    import { ref } from 'vue'
    import { Link } from '@inertiajs/vue3';
    import SubmenuItem from "@/Components/SubmenuItem.vue"

    import HeaderTop from "@/Components/HeaderTop.vue"
    import HeaderBottom from "@/Components/HeaderBottom.vue"

    defineProps({
    })
</script>

<template>
    <header>
        <div class="container">
            <div class="wrapper">
                <HeaderTop />
                <HeaderBottom />
            </div>
        </div>
    </header>
</template>
