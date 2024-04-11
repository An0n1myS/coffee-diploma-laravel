<header class="fixed bg-black/60 flex flex-row justify-evenly items-center text-white font-medium w-full z-10 pt-3 pb-3">
    <div class="logo ">
        <a href="/"><img src="{{asset('image/logo.jpg')}}" class="" alt=""></a>
    </div>
    <ul class=" flex flex-row justify-evenly text-md p-5">
        <li class="mr-10"><a href="{{route('main')}}">Home</a></li>
        <li class="mr-10"><a href="{{route('catalog')}}">Coffee</a></li>
        <li class="mr-10"><a href="{{route('shake')}}">Cocktail</a></li>
        <li class="mr-10"><a href="{{route('blogs')}}">Blogs</a></li>
        <li class="mr-10"><a href="{{route('cart')}}">Cart</a></li>
        <li class="mr-10"><a href="{{route('wishlist')}}">Wishlist</a></li>
    </ul>
    <ul class="flex flex-row">
        @auth("web")
        <li class="mr-10"><a href="{{route('profile')}}">Profile</a></li>
        <li class="mr-10"><a href="{{route('logout')}}">Exit</a></li>
        @endauth
        @guest("web")
        <li class="mr-10"><a href="{{route('login')}}">Log-In</a></li>
        <li class="mr-10"><a href="{{route('register')}}">Sign-In</a></li>
        @endguest
    </ul>
</header>
