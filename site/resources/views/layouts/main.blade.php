<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Уголь</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <link href="{{ asset('/fontawesome/css/all.css') }}" rel="stylesheet">

        <link href="{{ asset('/css/skeleton.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/white-theme.css') }}" rel="stylesheet">

        <script>const csrf = "{{ csrf_token() }}";</script>

        @stack("css")
        <link rel="preload" as="script" href="{{ asset('/js/bundle.js') }}">
    </head>

    <body>
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

                                    <a href="/" class="logo-link"><img src="/images/calculation.webp" class="logo" alt="logo"></a>
                                    <span class="description">Достаквка угля и древесины</span>
                                </div>

                                <div class="row">
                                    <span class="dark-mode">
                                        <button class="icon dark-mode-icon"><i class="fa-solid fa-moon"></i></button>
                                    </span>
                                </div>
                            </div>

                            <div class="row main-menu">
                                <div class="link-list">
                                    <div class="item"><a class="link" href="/cb-of-rf"><span class="link-text">Курс рубля</span></a></div>
                                    <div class="item"><a class="link" href="/cb-of-th"><span class="link-text">Конвертация валют</span></a></div>
                                </div>

                                <div class="link-list">
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <nav class="row submenu">
                    <ul class="list">
                        <li class="item"><a class="link" href="/cb-of-rf">ЦБ РФ</a></li>
                        <li class="item"><a class="link" href="/cb-of-th">ЦБ Тайланда</a></li>
                    </ul>
                </nav>

                @yield("breadcrumbs")

                <div class="content">
                @yield("content", "Скоро здесь будет контент")
                </div>

                <span class="source">Изображения взяты с сайта <a style="color: hsla(200, 100%, 35%, 1); text-decoration: none" href="https://www.freepik.com/">Freepick</a></span>
            </div>
        </div>

        <script src="{{ asset('/js/bundle.js') }}"></script>
        @stack("js")
    </body>
</html>
