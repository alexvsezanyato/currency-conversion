@extends("layouts.main")

@push("css")
<link href="/css/skeleton/basket.css" rel="stylesheet">
<link href="/css/skeleton/products.css" rel="stylesheet">
<link href="/css/skeleton/ordering.css" rel="stylesheet">

<link href="/css/white-theme/basket.css" rel="stylesheet">
<link href="/css/white-theme/products.css" rel="stylesheet">
<link href="/css/white-theme/ordering.css" rel="stylesheet">
@endpush

@push("js")
<script src="/js/basket.js"></script>
<script src="/js/products.js"></script>
@endpush

@section("content")
<main class="basket-content">
    <div class="has-products" @if ($products) data-hidden="false" @else data-hidden="true" @endif>
        <div id="basket" class="products">
        @foreach ($products as $product)
            @include("partials/product")
        @endforeach
        </div>

        <form action="/basket/checkout" method="POST" class="form order-form">
            @csrf
            @include("partials/ordering")
        </form>
    </div>

    <div class="state success" data-hidden="true">
        <span class="text">Заказ принят</span>
    </div>

    <div class="state error" data-hidden="true">
        <span class="text">Произшла ошибка, попробуйтие ещё раз</span>
    </div>

    <div class="no-product" @if ($products) data-hidden="true" @else data-hidden="false" @endif>
        <div class="icon">
            <i class="fa-solid fa-basket-shopping"></i>
            <span class="count">0</span>
        </div>

        <div class="text">В корзине нет товаров</div>
    </div>
</main>

@endsection("content")
