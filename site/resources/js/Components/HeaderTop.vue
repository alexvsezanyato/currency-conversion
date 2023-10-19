<script setup>
    import { usePage } from '@inertiajs/inertia-vue3'
</script>

<template>
    <div class="row general">
        <div class="row">
            <span class="dark-mode">
                <span class="icon dark-mode-icon" style="margin-left:0"><i style="font-size:16px" class="fa-solid fa-bars"></i></span>
            </span>

            <a href="/" class="logo-link"><img src="/images/logo/logo.webp" class="logo" alt="logo"></a>
            <span class="description">Просмотр и конвертация валют</span>
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

            <button class="order-call">Заказать разработку сайта</button>

            <span class="dark-mode">
                <button class="icon dark-mode-icon"><i class="fa-solid fa-moon"></i></button>
            </span>
        </div>
    </div>
</template>

<style>
    header {
        z-index: 100;

        top: 0;
        position: fixed;
        width: 100%;

        padding: 5px;
        padding-top: 0;

        display: flex;
        flex-direction: column;
        align-items: center;

        height: 100px;
        width: 100%;
        max-width: var(--content-max-width);

        border-radius: 0 0 10px 10px;
    }

    header .wrapper {
        height: 100%;
        max-width: 100%;

        display: flex;
        flex-direction: column;

        border-radius: 10px;

        border: 1px solid;
        box-shadow: 0 2px 10px rgba(0, 0, 0, .12);
    }

    header .container {
        height: 100%;
        width: 100%;
        padding-top: 5px;
        border-radius: 0 0 50% 50%;
    }

    header .general {
        width: 100%;
        height: 50%;

        display: flex;
        justify-content: space-between;

        padding: 0 10px;

        border-bottom: 1px solid;
    }

    header .general .description {
        font-weight: 900;
    }

    header .general .icon {
        margin-right: 10px;
        width: 30px;
        height: 30px;
        min-width: 30px;
        min-height: 30px;
    }

    header .general .row {
        display: flex;
        align-items: center;
    }

    header .general .schedule {
        display: flex;
        padding-right: 10px;
    }

    header .general .contact-icon {
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        border-radius: 5px;
    }

    header .general .telegram-icon {
        color: hsla(200, 100%, 46%, 1);
    }

    header .general .whatsapp-icon {
        color: hsla(127, 66%, 55%, 1);
    }

    header .general .icon {
        font-size: 29px;
        transition: color .1s, background .1s;

        margin-right: 10px;
        width: 30px;
        height: 30px;
        min-width: 30px;
        min-height: 30px;
    }

    header .general .cost {
        border-radius: 50px;
        background: hsla(220, 15%, 70%, .22);
        padding-left: 16px;
        margin-right: 10px;
    }

    header .general .cost .icon {
        margin-right: 0;
    }

    header .general .dark-mode {
        display: flex;
        align-items: center;
    }

    header .general .dark-mode-icon {
        text-decoration: none;
        width: 30px;
        height: 30px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 30px;
        border: none;
        font-size: 16px;
        margin-left: 10px;
        margin-right: 0;
        cursor: pointer;
        transition: color .1s, background .1s;

        margin-right: 10px;
    }

    header .general .dark-mode:last-of-type .dark-mode-icon {
        margin-right: 0;
    }

    header .general .phone-icon {
        width: 30px;
        height: 30px;

        margin-left: 10px;
        padding: 5px;

        border-radius: 30px;

        transition: box-shadow .1s;
        text-decoration: none;
        font-size: 12px;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    header .general .phone-number {
        height: 18px;
        white-space: nowrap;
        margin-right: 10px;
        text-decoration: none;
        border-bottom: 1px dashed;
    }

    header .general .order-call {
        height: 30px;

        padding: 6px;
        border-radius: 10px;
        font-weight: 900;
        border: none;

        padding: 0 10px;
        cursor: pointer;
        transition: background .1s, color .1s, border .1s;
        white-space: nowrap;
    }

    header .logo-link {
        border-radius: 5px;
        margin-right: 10px;
        width: 30px;
        height: 30px;
        transition: background .3s;
    }

    header .logo {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        transition: opacity .1s;
    }

    header .general .phone {
        display: flex;
        align-items: center;
    }

    @media screen and (max-width: 900px) {
        header .general .description {
            display: none;
        }
    }

    @media screen and (max-width: 640px) {
        header .description {
            display: none;
        }

        header .order-call {
            display: none;
        }

        h1 {
            font-size: 30px;
        }

        header .schedule {
            display: none;
        }
    }

    @media screen and (max-width: 500px) {
        header .general .schedule {
            display: none;
        }

        header .general .contact-icon {
            display: none;
        }
    }

    @media screen and (max-width: 400px) {
        header .general .phone {
            display: none;
        }
    }

    header .wrapper {
        background: rgba(255, 255, 255, .9);
        border-color: hsla(220, 15%, 70%, .45);
        backdrop-filter: saturate(180%) blur(5px);
        /* box-shadow: 0 -20px 0 var(--main-background-color); */
    }

    header .general {
        border-bottom-color: hsla(220, 15%, 70%, .5);
    }

    header .logo-link:hover .logo {
        opacity: .9;
    }

    header .logo-link:active .logo {
        opacity: .8;
    }

    header .general .dark-mode-icon {
        color: #000;
        background: hsla(220, 15%, 70%, .35);
    }

    header .general .dark-mode-icon:hover {
        background: hsla(219, 10%, 50%, 1);
        color: #fff;
    }

    header .general .dark-mode-icon:active {
        background: hsla(219, 10%, 20%, 1);
    }

    header .general .order-call {
        background: hsla(200, 100%, 46%, 1);
        color: #fff;
    }

    header .general .order-call:hover {
        background: hsla(219, 10%, 50%, 1);
        color: #fff;
    }

    header .general .order-call:active {
        background: hsla(219, 10%, 20%, 1);
        color: #fff;
    }

    header .general .phone-number {
        border-bottom-color: #000;
        color: #000;
        border-radius: 5px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        transition: .1s background;
    }

    header .general .phone-number:hover {
        background: hsla(220, 15%, 70%, .5);
    }

    header .general .phone-number:active {
        background: hsla(220, 15%, 50%, .5);
    }

    header .general .contact-icon:hover {
        color: hsla(219, 10%, 50%, 1);
        /* background: hsla(219, 20%, 40%, .15); */
    }

    header .general .contact-icon:active {
        color: hsla(219, 10%, 20%, 1);
        /* background: hsla(219, 20%, 40%, .15); */
    }

    .no-product .icon {
        background: #fff;
        border-radius: 50%;
        padding: 10px;
    }
</style>
