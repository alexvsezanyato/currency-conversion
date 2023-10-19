<script setup lang="ts">
    import { ref } from 'vue'
    import { Link } from '@inertiajs/vue3';
    import SubmenuItem from "@/Components/SubmenuItem.vue"
</script>

<template>
    <nav class="row submenu">
        <ul class="list">
            <SubmenuItem :link="route(`main`)">Курс рубля</SubmenuItem>
            <SubmenuItem v-if="$page.props.auth.user" :link="route(`conversion`)">Конвертация валют</SubmenuItem>
        </ul>
    </nav>
</template>

<style scoped>
    .submenu {
        width: 100%;
        height: 100%;
        overflow-x: auto;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .submenu::-webkit-scrollbar {
          width: 0;
          height: 0;
    }

    .submenu .list {
        display: flex;
        justify-content: flex-start;
        list-style-type: none;
        width: 100%;
        padding: 0;
        margin: 0;
        padding-bottom: 5px;
    }
</style>
