<div class="product-container" data-js="product-container">
    <input hidden name="products[{{ $product->id }}][id]" value="{{ $product->id }}">
    <input hidden name="products[{{ $product->id }}][amount]" value="{{ $product->amount() }}">

    <div class="product" data-js="product" data-id="{{ $product["id"] }}">
        <div class="bordered">
            <div class="top">
                <div class="image"><img src="/images/product/{{ $product["image"] }}"></div>
            </div>

            <div class="middle">
                <div class="title">{{ $product["name"] }}</div>
                <div class="price"><span class="label">Цена:</span> <span class="value">{{ number_format($product["price"], 0, ".", " ") }}</span> <span class="currency">руб.</span></div>
            </div>


            <div class="bottom">
                <div class="count">
                    <div data-option-type="-" class="option minus">-</div>
                    <input class="value" name="count" value="{{ $product->amount() }}" size="1">
                    <div data-option-type="+" class="option plus">+</div>
                </div>

                <div class="cart-wrapper">
                    @if (!empty($pageType) && $pageType === "basket")
                    <button type="button" class="cart in" data-js="removable" data-id="{{ $product["id"] }}">
                        <span class="icon"><i class="icon fa fa-trash" aria-hidden="true"></i></span>
                        <span class="text">Удалить</span>
                    </button>
                    @else
                    <button type="button" class="cart in {{ $product->isInCart()? '' : 'hidden' }}" data-js="togglable" data-id="{{ $product["id"] }}">
                        <span class="icon"><i class="icon fa fa-trash" aria-hidden="true"></i></span>
                        <span class="text">В корзине</span>
                    </button>

                    <button type="button" class="cart not-in {{ $product->isInCart()? 'hidden' : '' }}" data-js="togglable" data-id="{{ $product["id"] }}">
                        <span class="icon"><i class="fa-solid fa-basket-shopping"></i></span>
                        <span class="text">В корзину</span>
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
