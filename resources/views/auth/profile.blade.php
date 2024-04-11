
@extends('layout.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@500&display=swap');
    </style>
    <div class="w-full h-screen flex flex-col items-center justify-start bg-neutral-800/95" >
        <div class="w-4/6 m-auto">
            <h2 class="font-caveat text-amber-600 text-[40px] w-4/6"> Your personal information</h2>
            <br>
            <p class="font-sans text-amber-600 text-[22px] w-full mt-2 ml-6 "> Your name: <span class="text-gray-50">{{$user->name}}</span></p>
            <p class="font-sans text-amber-600 text-[22px] w-full mt-2 ml-6 "> Your phone: <span class="text-gray-50">{{$user->phone}}</span></p>
            <p class="font-sans text-amber-600 text-[22px] w-full mt-2 ml-6 "> Your email: <span class="text-gray-50">{{$user->email}}</span></p>
        </div>

        <div class="w-4/6 m-auto">
            <h2 class="font-caveat text-amber-600 text-[40px] w-4/6"> Your order history</h2>
            <br>
            <table class="border border-gray-20 text-amber-600/70 font-light w-full">
                <thead>
                    <tr class="">
                        <th class="border border-gray-200 px-4 py-2">Client email</th>
                        <th class="border border-gray-200 px-4 py-2">Delivery method</th>
                        <th class="border border-gray-200 px-4 py-2">Payment</th>
                        <th class="border border-gray-200 px-4 py-2">Total amount</th>
                        <th class="border border-gray-200 px-4 py-2">Date</th>
                        <th class="border border-gray-200 px-4 py-2">Order status</th>

                    </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)
                    <tr  class="border border-gray-200 px-4 py-2 hover:bg-black/20">
                        <td class="border border-gray-200 px-4 py-2 ">
                            {{$order->user->email}}
                        </td>
                        <td class="border border-gray-200 px-4 py-2">
                            {{$order->delivery->name}}
                        </td>
                        <td class="border border-gray-200 px-4 py-2">
                            {{$order->payment->name}}
                        </td>
                        <td class="border border-gray-200 px-4 py-2">
                            {{$order->total_amount}}
                        </td>
                        <td class="border border-gray-200 px-2 py-2">
                            {{$order->date}}
                        </td>
                        <td class="border border-gray-200 px-2 py-2">
                            {{$order->status->name}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="w-4/6 m-auto">
            <h2 class="font-caveat text-amber-600 text-[40px] w-4/6"> Your cocktail history</h2>
            <br>
            @foreach($cocktails as $cocktail)
                <p class="font-sans text-amber-600 text-[22px] w-full mt-2 ml-6 "> Cocktail title: <span class="text-gray-50">{{$cocktail->title}}</span></p>
                <p class="font-sans text-amber-600 text-[22px] w-full mt-2 ml-6 "> Ingredients: <span class="text-gray-50">{{$cocktail->ingredients}}</span></p>
            @endforeach

        </div>

    </div>

@endsection
