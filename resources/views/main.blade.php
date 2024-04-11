
@extends('layout.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap');
    </style>
    <div class="bg-neutral-800/95">

        <div class="z-0 ">
            <div class="swiper-logo w-100% h-100% overflow-hidden">

                <div class="swiper-wrapper w-full h-full">
                    <div class="swiper-slide ">
                        <img class="" src="{{asset('/image/slider-1.jpg')}}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('/image/slider-2.jpg')}}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('/image/slider-3.jpg')}}" alt="">
                    </div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>


            </div>
        </div>
        <br>
        <br>
        <h2 class="font-caveat text-amber-600 text-[40px] w-4/6 m-auto"> Our Products</h2>
        <div class="">
            <div class="swiper w-2/3 ">
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
        </div>
        <br>
        <br>
        <h2 class="font-caveat text-amber-600 text-[40px] w-4/6 m-auto"> Our New Products</h2>
        <div class="swiper w-2/3 ">
            <div class="swiper-wrapper">
                @foreach($new_products as $new_product)
                    <div class="swiper-slide min-w-[280px] max-w-[280px]">
                        <div class="relative bg-[#232126]">
                            <img src="data:image/png;base64,{{ base64_encode($new_product->image_url) }}" alt="Image" class="w-full m-auto mt-16 mb-4 min-h-[365px] max-h-[300px]">
                            <div class="absolute">

                            </div>
                        </div>
                        <div class="ml-4 mt-2">
                            <p class="text-gray-500 font-light text-[18px]">{{$new_product->name}}</p>
                            <p class="text-amber-600/80 font-bold text-[20px] mb-5">${{$new_product->price}}</p>
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
        <br>

        <h2 class="font-caveat text-amber-600 text-[40px] w-4/6 m-auto"> Our News</h2>

        <div class="swiper w-2/3 ">
            <div class="swiper-wrapper">

                @foreach($blog_list as $blog)
                    <div class="flex flex-col mt-14 max-w-[33%] ml-2 mr-2">
                        <div class="w-full">
                            <img src="{{asset($blog->photo_url)}}" alt="" class="w-full h-60 object-cover object-center">
                        </div>

                        <div class="flex flex-col text-amber-600 text-[20px] justify-between h-full">
                            <div class="flex flex-row text-[14px] mt-2">
                                <p>{{$blog->created_date}}</p>
                                <!-- Добавьте дополнительный текст или информацию, если необходимо -->
                            </div>
                            <p class="text-white font-medium text-[24px]">{{$blog->title}}</p>
                            <p class="text-gray-500 text-[16px] mt-2">{{$blog->short_text}}</p>
                            <div class="mt-auto">
                                <button class="w-full p-3 bg-amber-600">
                                    <a href="{{route('blog',['blog'=>$blog->id])}}" class="text-white text-[20px] font-medium">Read More</a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <br>
            <br>
        </div>
    </div>

@endsection
