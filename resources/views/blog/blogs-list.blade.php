
@extends('layout.app')

@section('content')
    <div class="bg-neutral-800/95">
        <div class="info w-full" style="background: url('image/sublogo.jpg'); background-size: cover; background-repeat: no-repeat;">
            <br>
            <br>
            <br>
            <h2 class="text-white text-xl text-start w-5/6 m-auto pt-32">Make your cocktail</h2>
            <br>
            <br>
        </div>

        <div class="w-4/6 m-auto mt-10 pb-10">
            @foreach($blog_list as $blog)
                <div class="flex flex-row mt-14">
                    <div class="min-w-[48%]">
                        <img src="{{asset($blog->photo_url)}}" alt="" class="w-[90%]">
                    </div>

                    <div class="flex flex-col max-w-[50%] text-amber-600 text-[20px] justify-evenly">
                        <div class="flex flex-row">
                            <p>{{$blog->created_date}}</p>
                            <p></p>
                        </div>
                        <p class="text-white font-medium text-[28px]">{{$blog->title}}</p>
                        <p class="text-gray-500 text-[20px]">{{$blog->short_text}}</p>
                        <button class=" w-1/3 p-10 pt-3 pb-3 bg-amber-600"><a href="{{route('blog',['blog'=>$blog->id])}}" class="text-white text-[20px] font-medium">Read More</a></button>
                    </div>
                </div>
            @endforeach
        </div>

    </div>


@endsection
