@extends('layout.app')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@500&display=swap');
    </style>
    <div class=" h-screen flex items-center justify-center bg-neutral-800/95" >
        <div class=" w-2/4 p-8 rounded-lg " style="background: rgba(49,49,49,0.6)">
            <p class="text-amber-600/70">If you already haven`t an account with us, please register at the <a class="text-white hover:text-amber-600" href="{{route('register')}}">register page</a>.</p>
            <h2 class="font-caveat text-amber-600/70 text-[34px] w-4/6 "> Your Personal Details</h2>
            <hr><br>
            <form action="{{route('login_proc')}}" method="post">
                @csrf
                <div class="mb-4 flex">
                    <label for="email" class="block text-[20px] font-medium mb-2 basis-1/3 text-amber-600/70"><span class="text-amber-800 text-[24px]">*</span>E-Mail</label>
                    <input type="email" id="email" name="email" class=" text-gray-500 w-full px-4 py-2 bg-black/40 border border-transparent focus:border-amber-600 focus:outline-none focus:ring-amber-200">
                </div>
                <div class="mb-4 flex">
                    <label for="password" class="block text-[20px] font-medium mb-2 basis-1/3 text-amber-600/70"><span class="text-amber-800 text-[24px]">*</span>Password</label>
                    <input type="password" id="password" name="password" class="text-gray-500 w-full px-4 py-2 border bg-black/40 border-transparent focus:border-amber-600 focus:outline-none focus:ring-amber-200">
                </div><br>
                <div class="flex flex-row justify-end">
                    <button type="submit" class="w-1/3 bg-amber-600 text-white py-2 hover:bg-amber-500">Continue</button>
                </div>
            </form>
        </div>
    </div>
@endsection
