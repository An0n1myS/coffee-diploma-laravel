
@extends('layout.app')

@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@500&display=swap');
    </style>

    <div class="info w-full" style="background-image: url('image/sublogo.jpg')">
        <br>
        <br>
        <br>
        <h2 class="text-white text-xl text-start mt-10 w-5/6 m-auto pb-10">Coffee</h2>

    </div>
    <div class="w-full bg-neutral-800/95 ">
        <div class="h-full flex flex-row  justify-center items-start w-11/12 ">
            <aside class="mt-[2%] basis-1/3 ml-[8%]">
                <h2 class="text-5xl text-orange-200/70" style="font-family: 'Caveat', cursive;">Categories</h2>
                <br>
                <br>
                <div class="product-category flex flex-col text-2xl text-white/70 ml-[5%] items-start">
                    <a href="{{ route('catalog') }}" class="tab-button {{ !$categoryId ? 'active' : '' }}">Всі товари</a>
                    @foreach($categories as $category)
                        <a href="{{ route('catalog', ['category' => $category->id]) }}" class="tab-button mt-[5%] {{ $categoryId == $category->id ? 'active' : '' }}">{{ $category->name}}</a>
                    @endforeach
                </div>
            </aside>
            <div class="">
                <div class="mt-14 mb-8">
                    {{ $products->links('pagination.simple-tailwind') }}
                </div>
                <div class="grid grid-cols-1 gap-x-6 gap-y-10 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    @foreach($products as $product)

                        <div class="group relative">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                <a href="{{ route('product', ['product' => $product->id]) }}">
                                    <img src="data:image/png;base64,{{ base64_encode($product->image_url) }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="min-h-[300px] max-h-[300px] h-full w-full object-cover object-center">
                                </a>
                                <div class="ab absolute top-2 right-2 flex flex-col justify-start space-y-2 opacity-0 scale-0 group-hover:opacity-100 group-hover:scale-100 transition-all duration-300">
                                    <form action="{{route('new_cart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                                        <button type="submit" data-toggle="tooltip" class="addcart bg-neutral-800/95 w-9 p-1.5 hover:bg-amber-700/90">
                                            <svg id="Layer_1"  viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <style type="text/css">
                                                    .st0{fill:#ffffff;}
                                                </style>
                                                <path class="st0" d="M20.9,6H17V5c0-2.8-2.2-5-5-5S7,2.2,7,5v5h2V8h4V6H9V5c0-1.7,1.3-3,3-3c1.7,0,3,1.3,3,3v5h2V8h2.1l0.9,14H4.1  L4.9,8H5V6H3.1L1.9,24h20.1L20.9,6z" fill="black" />
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="{{route('new_wishlist')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                                        <button type="submit" class="wishlist bg-neutral-800/95 w-9 p-1 hover:bg-amber-700/90">
                                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.16,4.61A6.27,6.27,0,0,0,12,4a6.27,6.27,0,0,0-8.16,9.48l7.45,7.45a1,1,0,0,0,1.42,0l7.45-7.45A6.27,6.27,0,0,0,20.16,4.61Zm-1.41,7.46L12,18.81,5.25,12.07a4.28,4.28,0,0,1,3-7.3,4.25,4.25,0,0,1,3,1.25,1,1,0,0,0,1.42,0,4.27,4.27,0,0,1,6,6.05Z"  fill="white" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <h3 class="mt-4 text-lg font-medium text-neutral-400"><a href="{{ route('product', ['product' => $product->id]) }}">{{$product->name}}</a></h3>
                            <p class="mt-1 text-lg font-medium text-amber-600/70">${{$product->price}}</p>
                        </div>


                    @endforeach
                </div>

                <div class="mt-4 mb-14">
                    {{ $products->links('pagination.simple-tailwind') }}
                </div>


            </div>

        </div>
    </div>


@endsection
