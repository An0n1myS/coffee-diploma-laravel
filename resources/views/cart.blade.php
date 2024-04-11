
@extends('layout.app')

@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap');
    </style>
    <div class="info w-full" style="background-image: url('../image/sublogo.jpg')">
        <br>
        <br>
        <br>
        <h2 class="text-white text-xl text-end mt-10 w-5/6 m-auto pb-10"><a href="{{route('main')}}">Home</a> » <a href="{{route('catalog')}}">Catalog</a> » Cart</h2>

    </div>

    <div class=" h-screen flex items-center justify-center bg-neutral-800/95" >
        <div class="h-full">
            @if($cart_items->isEmpty())
                <p>Wishlist is empty</p>
            @else
                <br>
                <table class="border border-gray-20 text-amber-600/70 font-light">
                    <thead>
                    <tr class="">
                        <th class="border border-gray-200 px-4 py-2">Image</th>
                        <th class="border border-gray-200 px-4 py-2">Product Name</th>
                        <th class="border border-gray-200 px-4 py-2">Count</th>
                        <th class="border border-gray-200 px-4 py-2">Price</th>
                        <th class="border border-gray-200 px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($cart_items as $index => $cart_item)
                        <tr  class="border border-gray-200 px-4 py-2 hover:bg-black/20">
                            <td class="border border-gray-200 px-4 py-2 ">
                                <img src="data:image/png;base64,{{ base64_encode($cart_item->product->image_url) }}" alt="Image" class="w-[50%] m-auto ">
                            </td>
                            <td class="border border-gray-200 px-4 py-2">
                                <a class="text-gray-200 hover:text-amber-600" href="{{ route('product', ['product' => $cart_item->product->id]) }}">
                                    {{ $cart_item->product->name }}
                                </a>
                            </td>
                            <td class="border border-gray-200 px-4 py-2">
                                <form class="inline-flex flex-row items-center justify-center">
                                    <button type="button" class="decrement-button bg-neutral-800/95 w-9 p-1.5 hover:bg-amber-700/90">
                                        <svg id="Layer_1" viewBox="0 0 512 512"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <style type="text/css">
                                                .st0{fill:#ffffff;}
                                            </style>
                                            <path class="st0" d="M417.4,224H94.6C77.7,224,64,238.3,64,256c0,17.7,13.7,32,30.6,32h322.8c16.9,0,30.6-14.3,30.6-32  C448,238.3,434.3,224,417.4,224z"/>
                                        </svg>
                                    </button>

                                    <input class="quantity-input mr-1 ml-1 text-gray-500 max-w-[30%] px-4 py-2 bg-black/40 border border-transparent focus:border-amber-600 focus:outline-none focus:ring-amber-200" type="text" value="{{ $cart_item->count }}" data-product-id="{{ $cart_item->product->id }}">

                                    <button type="button" class="increment-button bg-neutral-800/95 w-9 p-1.5 hover:bg-amber-700/90">
                                        <svg id="Layer_1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <style type="text/css">
                                                .st0{fill:#ffffff;}
                                            </style>
                                            <path class="st0" d="M417.4,224H288V94.6c0-16.9-14.3-30.6-32-30.6c-17.7,0-32,13.7-32,30.6V224H94.6C77.7,224,64,238.3,64,256  c0,17.7,13.7,32,30.6,32H224v129.4c0,16.9,14.3,30.6,32,30.6c17.7,0,32-13.7,32-30.6V288h129.4c16.9,0,30.6-14.3,30.6-32  C448,238.3,434.3,224,417.4,224z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            <td class="border border-gray-200 px-4 py-2">

                            <?php
                                $currentPrice = $cart_item->product->price*$cart_item->count;
                            ?>
                            $<span id="productTotal_{{$index}}" class="product-total">{{$currentPrice}}</span>
                                <input type="hidden" value="{{$cart_item->product->price}}" class="price-product-value">
                            </td>
                            <td class="border border-gray-200 px-2 py-2">
                                <form class="ml-4" action="{{ route('removeFromWishlist') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" id="product_id" value="{{$cart_item->product->id}}">
                                    <button class="bg-neutral-800/95 w-9 p-1.5 hover:bg-amber-700/90" >
                                        <svg  id="Layer_1" viewBox="0 0 512 512"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <style type="text/css">
                                                .st0{fill:#ffffff;}
                                            </style>
                                            <path class="st0"  d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/>
                                        </svg>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

                <p class="text-amber-600/70 font-bold mt-4 mr-4 text-end text-[22px]">
                    <?php
                    $total_price = 0;  // Инициализация переменной перед циклом

                    foreach($cart_items as $index => $cart_item) {
                        $total_price += $cart_item->product->price * $cart_item->count;
                    }
                    ?>
                    Total price: <span id="totalPrice" class="totalCartPrice font-light text-gray-50">${{$total_price}}</span>
                </p>


            <div class="flex flex-row justify-end">
                <a href="{{route('createOrder')}}" class="w-1/4 bg-amber-600 text-white py-2 hover:bg-amber-500 text-center mt-10">Continue</a>
            </div>
        </div>
    </div>
    <script>
        const decrementButtons = document.querySelectorAll('.decrement-button');
        const incrementButtons = document.querySelectorAll('.increment-button');
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const productPriceElements = document.querySelectorAll('.product-total');
        const productPriceValueElements = document.querySelectorAll('.price-product-value');
        const totalCartPrice = document.querySelector('.totalCartPrice');
        const minValue = 1;

        decrementButtons.forEach(function (button, index) {
            button.addEventListener('click', function() {
                let currentValue = parseInt(quantityInputs[index].value) || minValue;
                let currentPriceValue = parseFloat(productPriceValueElements[index].value);
                if (currentValue > minValue) {
                    quantityInputs[index].value = currentValue - 1;
                    updateProductTotal(index, currentPriceValue);
                }
            });
        });

        incrementButtons.forEach(function (button, index) {
            button.addEventListener('click', function() {
                let currentValue = parseInt(quantityInputs[index].value) || minValue;
                let currentPriceValue = parseFloat(productPriceValueElements[index].value);
                quantityInputs[index].value = currentValue + 1;
                updateProductTotal(index, currentPriceValue);
            });
        });

        function updateProductTotal(index, price, quantityChange = 0) {
            const quantityInput = quantityInputs[index];
            const productPriceElement = productPriceElements[index];

            if (quantityInput && productPriceElement) {
                let quantity = parseInt(quantityInput.value) || minValue;
                quantity += quantityChange;

                if (quantity < minValue) {
                    quantity = minValue;
                }

                const total = quantity * price;
                productPriceElement.textContent = total.toFixed(0);

                let totalCart = 0;
                productPriceElements.forEach(function (element) {
                    totalCart += parseFloat(element.textContent);
                });

                totalCartPrice.textContent = totalCart.toFixed(0);
            }
        }

    </script>
@endsection
