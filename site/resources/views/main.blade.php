@extends("layouts.main")

@push("css")
<link href="/css/skeleton/products.css" rel="stylesheet">
<link href="/css/white-theme/products.css" rel="stylesheet">

<link href="/css/skeleton/main.css" rel="stylesheet">
<link href="/css/white-theme/main.css" rel="stylesheet">

<link href="/css/skeleton/plain-request-form.css" rel="stylesheet">
<link href="/css/white-theme/plain-request-form.css" rel="stylesheet">

<link href="/css/white-theme/main.css" rel="stylesheet">

<link href="/css/skeleton/landing.css" rel="stylesheet">
<link href="/css/white-theme/landing.css" rel="stylesheet">
@endpush

@section("main-slider")
<!--<div class="first-screen-background" style="background-image:url('/images/coal-2.webp')"><div class="dimming"></div></div>-->

<div class="slider-1 slider">
    <div class="slider-item-wrapper" style="background-image:url('/images/slider/coal-2.webp')">
        <div class="dimming">
            <div class="slider-item">
                <div class="slider-description">
                    <div class="wrapper">
                        <h1 class="header-text">Уголь в новосибирске</h1>
                        <span style="font-size: 24px">От 1 тонны и выше</span>
                    </div>
                </div>

                <div class="request">
                    <span class="form-title source">Оставьте завявку и мы перезвоним</span>

                    <div class="row">
                        <form action="/api/call-request" method="POST" class="request-form form">
                            <div class="result" style="display:none"><span class="message"></span></div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="input-list">
                                <input type="text" name="name" placeholder="Имя" required>
                                <input type="tel" name="phone" placeholder="Телефон" required>
                                <input type="email" name="email" placeholder="Эл. почта" required>

                                <div data-display-none class="response">Ваша заявка принята</div>
                            </div>

                            <div class="submit-wrapper">
                                <x-button type="submit">Отправить</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("content")
@endsection("content")
