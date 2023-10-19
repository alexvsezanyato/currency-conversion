<script setup lang="ts">
    import { ref } from 'vue'
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        link: String
    })
</script>

<template>
    <li class="item"><Link class="link" :href="link"><slot /></Link></li>
</template>

<style scoped>
    .submenu .list .item {
        margin-right: 5px;
    }

    .submenu .list .item .link {
        border-radius: 50px;
        padding: 5px 12px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 900;
        white-space: nowrap;

        display: block;
        border: 1px solid;

        transition: background .1s, color .1s;
    }

    .submenu .list .item .link {
        background: #fff;
        color: #000;
        border-color: hsla(220, 15%, 70%, .5);
    }

    .submenu .list .item .link:hover {
        background: hsla(220, 5%, 80%, .5);
    }

    .submenu .list .item .link:active {
        background: hsla(220, 15%, 70%, .5);
    }
</style>
