<nav class="bg-neutral-800 flex flex-row justify-evenly items-center text-white w-full">
    <div class="">
        <p>Categories</p>
    </div>
    <ul class=" flex flex-row justify-evenly text-md p-5">
        <ul class=" flex flex-row justify-evenly text-md p-5">



        </ul>
        @foreach($categories as $category)
            <li class="mr-10"><a href="{{route('main')}}">Home</a></li>
        @endforeach
    </ul>

</nav>
