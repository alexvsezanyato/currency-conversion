<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    currencies: Object,
});
</script>

<template>
    <ul class="currency-list">
        <li class="item-wrapper" v-for="currency in currencies">
            <div class="item">
                <div class="code">{{ currency.code }}</div>
                <div class="description">
                    <div class="value-wrapper"><span class="value">{{ currency.value }} RUB</span></div>
                    <div class="name">{{ currency.name }}</div>
                </div>
            </div>
        </li>
    </ul>
</template>

<style>
    .currency-list {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 5px;
        z-index: 1;
    }

    .currency-list .item-wrapper {
        /* background: url("/images/calculation.webp"); */
        border-radius: 10px;
        border: 1px solid hsla(220, 15%, 70%, 1);
        overflow: hidden;
    }

    .currency-list .item {
        display: flex;
        height: 75px;
        align-items: center;
        backdrop-filter: saturate(180%) blur(50px);
        background: rgba(255, 255, 255, .8);
    }

    .currency-list .item .code {
        height: 100%;
        min-width: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-right: 1px solid hsla(220, 15%, 70%, .5);
        background: #fff;
    }

    .currency-list .item .description {
        display: flex;
        gap: 20px;
        padding: 0 20px;
        align-items: center;
        flex-grow: 1;
        height: 100%;
    }

    .currency-list .item .name {
        height: 100%;
        display: flex;
        align-items: center;
    }

    .currency-list .item .value-wrapper {
        height: 100%;
        display: flex;
        align-items: center;
    }

    .currency-list .item .value {
        display: flex;
        justify-content: center;
        background: hsla(220, 15%, 70%, .3);
        padding: 5px 20px;
        border-radius: 50px;
        backdrop-filter: saturate(180%) blur(5px);
    }

    @media screen and (max-width: 500px) {
        .currency-list .item .description {
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            gap: 5px;
            padding: 0 10px;
        }

        .currency-list .item .name {
            height: unset;
        }

        .currency-list .item .value-wrapper {
            height: unset;
        }
    }
</style>
