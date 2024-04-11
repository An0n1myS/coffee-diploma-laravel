
@extends('layout.app')

@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap');
    </style>
    <div class="info w-full" style="background-image: url('../image/sublogo.jpg')">
        <br>
        <br>
        <br>
        <h2 class="text-white text-xl text-end mt-10 w-5/6 m-auto pb-10"><a href="{{route('main')}}">Home</a> » <a href="{{route('catalog')}}">Catalog</a> » Wishlist</h2>

    </div>

    <div class=" h-screen flex items-center justify-center bg-neutral-800/95" >
        <div class="h-full">
            @if($wishlist_items->isEmpty())
                <p>Wishlist is empty</p>
            @else
                <br>
                <table class="border border-gray-20 text-amber-600/70 font-light">
                    <thead>
                    <tr class="">
                        <th class="border border-gray-200 px-4 py-2">Image</th>
                        <th class="border border-gray-200 px-4 py-2">Product Name</th>
                        <th class="border border-gray-200 px-4 py-2">Price</th>
                        <th class="border border-gray-200 px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($wishlist_items as $wishlist_item)
                        <tr  class="border border-gray-200 px-4 py-2 hover:bg-black/20">
                            <td class="border border-gray-200 px-4 py-2 ">
                                <img src="data:image/png;base64,{{ base64_encode($wishlist_item->product->image_url) }}" alt="Image" class="w-[50%] m-auto ">
                            </td>
                            <td class="border border-gray-200 px-4 py-2"><a class="text-gray-200 hover:text-amber-600" href="{{ route('product', ['product' => $wishlist_item->product->id]) }}">{{ $wishlist_item->product->name }}</a></td>
                            <td class="border border-gray-200 px-4 py-2">${{ $wishlist_item->product->price }}</td>
                            <td class="border border-gray-200 px-4 py-2">
                                <div class="flex flex-row justify-between">
                                    <form action="{{route('new_cart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" id="product_id" value="{{$wishlist_item->product->id}}">
                                        <button type="submit" data-toggle="tooltip" class="addcart bg-neutral-800/95 w-9 p-1.5 hover:bg-amber-700/90">
                                            <svg id="Layer_1"  viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <style type="text/css">
                                                    .st0{fill:#ffffff;}
                                                </style>
                                                <path class="st0" d="M20.9,6H17V5c0-2.8-2.2-5-5-5S7,2.2,7,5v5h2V8h4V6H9V5c0-1.7,1.3-3,3-3c1.7,0,3,1.3,3,3v5h2V8h2.1l0.9,14H4.1  L4.9,8H5V6H3.1L1.9,24h20.1L20.9,6z" fill="black" />
                                        </svg>
                                        </button>
                                    </form>
                                    <form class="ml-4" action="{{ route('removeFromWishlist') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" id="product_id" value="{{$wishlist_item->product->id}}">
                                        <button class="bg-neutral-800/95 w-9 p-1.5 hover:bg-amber-700/90" >
                                            <svg  id="Layer_1" viewBox="0 0 512 512"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <style type="text/css">
                                                .st0{fill:#ffffff;}
                                            </style>
                                                <path class="st0"  d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/>
                                        </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

                <div class="flex flex-row justify-end">
                    <a href="{{route('catalog')}}" class="w-1/4 bg-amber-600 text-white py-2 hover:bg-amber-500 text-center mt-10">Continue</a>
                </div>
        </div>
    </div>

@endsection
