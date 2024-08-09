<header class="header-section-other pb-5">
    <div class="container-fluid pb-5">
        <div class="logo">
            <a href="./index.html"><img src="/img/little-logo.png" alt=""></a>
        </div>
        <div class="nav-menu">
            <nav class="main-menu mobile-menu">
                <ul>
                    <li class="active"><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/')}}#recipes">Recipes</a></li>
                    <li><a href="#footer">Contact</a></li>

                    @if (Route::has('login'))

                    @auth
                    <li><a href="{{url('create_post')}}">Create Post</a></li>
                    <li><a href="{{url('myPosts')}}">My Posts</a></li>
                    <li>

                        <x-app-layout>
                        </x-app-layout>
                    </li>

                    @else

                    <li><a href="{{route('login')}}">Login</a></li>
                    <li><a href="{{route('register')}}">register</a></li>
                    @endauth

                    @endif
                </ul>
            </nav>
            <div class="nav-right search-switch">
                <i class="fa fa-search"></i>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>