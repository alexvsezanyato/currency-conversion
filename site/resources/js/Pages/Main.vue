<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AlternativeLayout from '@/Layouts/AlternativeLayout.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    currencies: Array,
});
</script>

<template>
    <AlternativeLayout
        title="Home page"
        canLogin="canLogin"
        canRegister="canRegister"
        h1="Курс рубля"
    >
        <ul class="currency-list">
            <li class="item-wrapper" v-for="currency in currencies">
                <div class="item">
                    <div class="code">{{ currency.code }}</div>
                    <div class="description">
                        <div class="value-wrapper"><span class="value">{{ currency.value }}</span></div>
                        <div class="name">{{ currency.name }}</div>
                    </div>
                </div>
            </li>
        </ul>
    </AlternativeLayout>
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
        width: 75px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-right: 1px solid hsla(220, 15%, 70%, .5);
        background: #fff;
    }

    .currency-list .item .description {
        display: flex;
        align-items: center;
        flex-grow: 1;
        height: 100%;
    }

    .currency-list .item .name {
        padding: 0 30px;
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
        width: 100px;
        display: flex;
        justify-content: center;
        background: hsla(220, 15%, 70%, .3);
        padding: 5px 20px;
        border-radius: 50px;
        margin-left: 30px;
        backdrop-filter: saturate(180%) blur(5px);
    }
</style>
