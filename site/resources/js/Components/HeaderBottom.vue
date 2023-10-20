<script setup>
    import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="row main-menu">
        <div class="link-list">
        </div>

        <div class="link-list">
            <template v-if="$page.props.canLogin">
                <template v-if="$page.props.auth.user">
                    <div class="item"><Link class="link" :href="route('logout')">Выйти</Link></div>
                </template>

                <template v-else>
                    <div class="item"><Link class="link" :href="route('login')"><span class="link-text">Войти</span></Link></div>

                    <div class="item"><Link class="link" v-if="canRegister" :href="route('register')"><span class="link-text">Зарегистрироваться</span></Link></div>
                </template>
            </template>
        </div>
    </div>
</template>

<style>
    .main-menu {
        display: flex;
        justify-content: space-between;
        width: 100%;
        /* width: 100vw; */

        overflow-x: auto;
        -ms-overflow-style: none;
        scrollbar-width: none;

        padding: 0 10px;
        max-width: 100%;
        height: 50%;
    }

    .main-menu::-webkit-scrollbar {
          width: 0;
          height: 0;
    }

    .main-menu .link-list {
        display: flex;
    }

    .main-menu ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .main-menu .link {
        font-weight: 700;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        transition: color .1s;
        text-decoration: none;

        font-size: 14px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .main-menu .link .link-text {
        border-radius: 3px;
    }

    .main-menu .link-list .item {
        margin-right: 20px;
        display: flex;
        flex-direction: column;
    }

    .main-menu .link-list .contact-link {
        margin-right: 0;
    }

    .main-menu .link-list .item:after {
        content: "";
        width: 100%;
        margin-top: 1px;
        height: 3px;
        border-radius: 10px 10px 0 0;
        transition: background .1s;
    }

    .main-menu .link-list:last-child .item:last-child {
        margin-right: 0;
    }

    .main-menu .link-list .link-text {
        position: relative;
        top: 2px;
    }

    .main-menu .link {
        color: #000;
    }

    .main-menu .link .link-text {
        transition: background .1s;
    }

    .main-menu .link:hover .link-text {
        /* background: hsla(220, 15%, 70%, .25); */
        /* color: #555; */
    }

    .main-menu .link:active .link-text {
        /* background: hsla(220, 15%, 70%, .4); */
        /* color: #000; */
    }

    .main-menu .link-list .item:after {
        background: rgba(0,0,0,0);
    }

    .main-menu .link-list .item:hover:after {
        background: hsla(220, 15%, 70%, .5);
    }

    .main-menu .link-list .item:active:after {
        background: hsla(220, 15%, 50%, .5);
    }
</style>
