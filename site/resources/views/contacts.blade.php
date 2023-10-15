@extends("layouts.main")

@push("css")
<link href="/css/skeleton/contacts.css" rel="stylesheet">
<link href="/css/white-theme/contacts.css" rel="stylesheet">
@endpush

@push("breadcrumbs")
{{ Breadcrumbs::render('contacts') }}
@endpush

@section("content")
<h1>Контакты</h1>

<div class="contacts">
    <div class="cards">
        <div class="row">
            <div class="item">
                <div class="description">
                    <span class="description-item description-title"><span class="icon"><i class="fa-solid fa-phone"></i></span><span>Номера телефонов</span></span>
                    <span class="description-item"><a href="tel:89963900000" class="phone-number">8 (996) 390-00-00</a></span>
                    <span class="description-item"><a href="tel:89963900000" class="phone-number">8 (996) 390-00-00</a></span>
                </div>
            </div>

            <div class="item">
                <div class="description">
                    <span class="description-item description-title"><span class="icon"><i class="fa-solid fa-envelope"></i></span><span>Электронная почта</span></span>
                    <span class="description-item"><a href="tel:89963900000" class="phone-number">alo-alo@gmail.com</a></span>
                    <span class="description-item"><a href="tel:89963900000" class="phone-number">alo-alo@yandex.ru</a></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="item">
                <div class="description">
                    <span class="description-item description-title"><span class="icon"><i class="fa-solid fa-hashtag"></i></span><span>Соц. сети</span></span>
                    <span class="description-item"><a href="tel:89963900000" class="phone-number">Ссылка на Telegram</a></span>
                    <span class="description-item"><a href="tel:89963900000" class="phone-number">Ссылка на Whatsapp</a></span>
                </div>
            </div>

            <div class="item">
                <div class="description">
                    <span class="description-item description-title"><span class="icon"><i class="fa-solid fa-calendar-days"></i></span><span>График работы</span></span>
                    <span class="description-item">Пн.-Пт. 8-17</span>
                </div>
            </div>
        </div>
    </div>

    <iframe class="ymaps-map map" src="https://yandex.ru/map-widget/v1/?scroll=false&um=constructor%3A356bea7be17be57ef30a764bd5f02be68c576674b6dedd99cf73dc26e3255109&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
</div>
@endsection
