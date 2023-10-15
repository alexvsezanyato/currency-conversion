<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
    h1: String,

    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <Head :title="title" />

    <div class="wrapper">
        <div class="top">
            <header>
                <div class="container">
                    <div class="wrapper">
                        <div class="row general">
                            <div class="row">
                                <span class="dark-mode">
                                    <span class="icon dark-mode-icon" style="margin-left:0"><i style="font-size:16px" class="fa-solid fa-bars"></i></span>
                                </span>

                                <a href="/" class="logo-link"><img src="/images/logo/logo.webp" class="logo" alt="logo"></a>
                                <span class="description">Достаквка угля и древесины</span>
                            </div>

                            <div class="row">
                                <!--<span class="dark-mode cost">
                                    <span><span data-js="price"><span style="font-size: 14px">&#8381;</span>&nbsp;0</span></span>
                                    <a href="/basket" class="icon dark-mode-icon"><i class="fa-solid fa-basket-shopping"></i></a>
                                </span>-->

                                <span class="schedule">Пн.-Пт.</span>

                                <span class="whatsapp">
                                    <a href="https://wa.me/79953900989" class="whatsapp-icon contact-icon icon"><i class="fa-brands fa-whatsapp"></i></a>
                                </span>

                                <span class="telegram">
                                    <a href="https://t.me/vsezanyato11" class="telegram-icon contact-icon icon"><i class="fa-brands fa-telegram"></i></a>
                                </span>

                                <!--<span class="phone">
                                    <a href="tel:89963900000" class="phone-number">8 (996) 390-00-00</a>
                                </span>-->

                                <button class="order-call">Заказать разработку сайта</button>

                                <span class="dark-mode">
                                    <button class="icon dark-mode-icon"><i class="fa-solid fa-moon"></i></button>
                                </span>
                            </div>
                        </div>

                        <div class="row main-menu">
                            <div class="link-list">
                            </div>

                            <div class="link-list">
                                <template v-if="canLogin">
                                    <div v-if="$page.props.auth.user" class="item"><Link class="link" :href="route('dashboard')">Dashboard</Link></div>

                                    <template v-else>
                                        <div class="item"><Link class="link" :href="route('login')"><span class="link-text">Войти</span></Link></div>

                                        <div class="item"><Link class="link" v-if="canRegister" :href="route('register')"><span class="link-text">Зарегистрироваться</span></Link></div>
                                    </template>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <nav class="row submenu">
                <ul class="list">
                    <li class="item"><Link class="link" :href="'/rate'">Курс рубля</Link></li>
                    <li v-if="$page.props.auth.user" class="item"><Link class="link" :href="'/conversion'">Конвертация валют</Link></li>
                </ul>
            </nav>

            <main class="content">
                <div class="slider-1 slider">
                    <div class="slider-item-wrapper" style="background-image:url('/images/calculation.webp')">
                        <div class="slider-item">{{ h1 }}</div>
                    </div>
                </div>

                <slot />
            </main>
        </div>
    </div>
</template>
