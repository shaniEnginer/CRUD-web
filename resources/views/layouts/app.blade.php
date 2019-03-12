<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--  <!-- CSRF Token -->  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    {{--  <!-- Styles -->  --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--  font awesom  --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
{{--  Tiny  --}}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  {{--    --}}
    <script>
  tinymce.init({
    selector: '#mytextarea'
  });
</script>

{{--  Custom  --}}

<style>
    .my-co
    {
        margin-left: 5px;
    }
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @if(Auth::user())
                    <ul class="navbar-nav mr-auto">
                        {{-- posts controller  --}}
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('posts.index') }}"><strong>  Posts</strong></a>
                            </li>
                            {{--  Routes Controllers --}}
                        
                        {{-- create posts   --}}
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts.create') }}"><strong> Create Post</strong></a>
                        </li>
                        
                    </ul>
@endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                        {{--  Suspicious  --}}
                            
                            
                                
                                    <li>

                                     {{--  cart  --}}
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('cart.index') }}"> <span><i class="fas fa-cart-plus"></i></span><strong>Shopping Cart</strong></a>
                                    </li>
                                    {{--  end cart  --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               <span><i class="fas fa-user"></i></span>     {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    {{--  Links Added in Drop down menu  --}}
                                    <a class="nav-link" href="{{route('dashbord')}}"><strong>Dashboard</strong></a>
                                    <a class="nav-link" href="{{ route('profile.get') }}"><strong>profile</strong></a>
                                    {{--   endlinks  --}}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
<div class="container">
    @include('includes.session')
            @yield('content')
        </div>
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
