
@extends('layout.app')

@section('content')
<div class="bg-neutral-800/95">
    <div class="info w-full" style="background: url('../image/sublogo.jpg'); background-size: cover; background-repeat: no-repeat;">
        <br>
        <br>
        <br>
        <h2 class="text-white text-xl text-start w-5/6 m-auto pt-32"> {{$blog->title}}</h2>
        <br>
        <br>
    </div>
    <br>
    <div class="w-4/6 m-auto text-amber-600/90 text-[18px]">
        <div class="w-full">
            <img src="{{asset($blog->photo_url)}}" class="w-[100%]" alt="">
        </div>
        <br>
        <div class=" w-1/4 flex flex-row justify-evenly">
            <p>{{$blog->created_date}}</p>

            <p>|</p>

            <p>{{$count_review}} Comments</p>
        </div>
        <br>
        <p class="text-amber-50/50 text-[18px]">{{$blog->long_text}}</p>
        <br>
    </div>
    @if($count_review==0)
        <br>
    @else
        @foreach($reviews as $review)
            <div class="w-4/6 m-auto bg-black/30 p-3 text-amber-50/50 text-[18px]">
                <p class="text-amber-600/90 text-[20px] mb-2">{{$review->email}}</p>
                <p class="mb-2">{{$review->created_date}}</p>
                <p>{{$review->comment}}</p>
            </div>
        @endforeach
    @endif

    <br>

    <div class="w-4/6 m-auto">
        <div class="text-white w-full p-5 bg-orange-300/75">
            <p>Add Comments</p>
        </div>
        <br>
        <form action="{{route('addReview')}}" method="post" class="min-w-50%">
            @csrf
            <div class="flex flex-row justify-between">
                <p class="min-w-[30%] text-amber-600/90 text-[20px]">* Title</p>

                <input name="title" type="text" placeholder="Title" class="text-gray-50 w-full bg-black/30 p-3">

            </div>
            <br>
            <div class="flex flex-row justify-between">
                <p class="min-w-[30%] text-amber-600/90 text-[20px]">* Email</p>

                <input name="email" type="email" placeholder="Email" class="text-gray-50 w-full bg-black/30 p-3">

            </div>
            <br>
            <div class="flex flex-row justify-between">
                <p class="min-w-[30%] text-amber-600/90 text-[20px]">* Comment</p>

                <textarea placeholder="Comment" name="comment" class="text-gray-50 w-full bg-black/30 p-3" ></textarea>

            </div>
            <input type="hidden" name="blog_id" value="{{$blog->id}}">
            <button class="w-1/5 bg-amber-600 text-white py-3 px-3 hover:bg-amber-500 text-[20px] text-center mt-10 mb-10 ml-[30%]" type="submit">Leave Comment</button>
        </form>
    </div>
</div>

@endsection
