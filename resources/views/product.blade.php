
@extends('layout.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap');
    </style>
    <div class="info w-full" style="background-image: url('../image/sublogo.jpg')">
        <br>
        <br>
        <br>
        <h2 class="text-white text-xl text-end mt-10 w-5/6 m-auto pb-10"><a href="{{route('main')}}">Home</a> » <a href="{{route('catalog')}}">Catalog</a> » {{$product->name}}</h2>

    </div>

    <div class="w-full bg-neutral-800/95 h-full">

        <div class="flex flex-row w-4/6 m-auto">
            <div class="basis-1/2 mt-10">
                <img class=" w-[300%] object-cover object-center" src="data:image/png;base64,{{ base64_encode($product->image_url) }}" alt=".">
            </div>
            <div class="col-sm-6 right_info text-amber-600 text-[24px] ml-10 mt-10 flex flex-col justify-between  w-4/6">
                <h1 class="">{{$product->name}}</h1>
                <hr>
                <ul class="list-unstyled">
                    <li class="tax"> ${{$product->price}}</li>
                </ul>
                <hr>
                <div class="">
                    <form action="">
                        <input type="hidden" value="{{$product->id}}">
                        <div class="relative flex items-center max-w-[8rem]">
                            <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 hover:bg-gray-200 border border-gray-300  p-3 h-11  focus:outline-none">
                                <svg class="w-3 h-3 text-amber-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                </svg>
                            </button>
                            <input min="1" type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm block w-full py-2.5 " value="1" placeholder="1" required>
                            <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 hover:bg-gray-200 border border-gray-300  p-3 h-11 focus:outline-none">
                                <svg class="w-3 h-3 text-amber-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="text-gray-300 text-justify text-[20px]">
                    <p>{{$product->description}}</p>
                </div>
            </div>

        </div>

        <br>
        <br>

        <h2 class="font-caveat text-amber-600 text-[40px] w-4/6 m-auto"> Our New Products</h2>

        <div class="">
            <!-- Slider main container -->
            <div class="swiper w-4/6 ">
                <div class="swiper-wrapper">
                    @foreach($products as $product)
                        <div class="swiper-slide min-w-[280px] max-w-[280px]">
                            <div class="relative bg-[#232126]">
                                <img src="data:image/png;base64,{{ base64_encode($product->image_url) }}" alt="Image" class="w-full m-auto mt-16 mb-4 min-h-[365px] max-h-[300px]">
                                <div class="absolute">

                                </div>
                            </div>
                            <div class="ml-4 mt-2">
                                <p class="text-gray-500 font-light text-[18px]">{{$product->name}}</p>
                                <p class="text-amber-600/80 font-bold text-[20px] mb-5">${{$product->price}}</p>
                            </div>
                            <br>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
            <br>
            <br>
        </div>

    </div>


    <script>
        const decrementButton = document.getElementById('decrement-button');
        const incrementButton = document.getElementById('increment-button');
        const quantityInput = document.getElementById('quantity-input');

        const minValue = 1;

        decrementButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value) || minValue;
            if (currentValue > minValue) {
                quantityInput.value = currentValue - 1;
            }
        });

        incrementButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value) || minValue;
            quantityInput.value = currentValue + 1;
        });
    </script>



@endsection
