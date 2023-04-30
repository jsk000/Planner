<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Family Planner') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/fe50865e79.js" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div >
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" style="font-size: 40px;" href="{{ url('/') }}">
                        {{ config('app.name', 'Family Planner') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ url('parent') }}"> parent's section
                                    </a>
                                    <a class="dropdown-item" href="{{ url('list') }}"> children's section
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header - set the background image for the header in the line below-->
        <header class="py-5 bg-image-full" style="background-image: url('https://images.unsplash.com/photo-1498262257252-c282316270bc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80')">
            <div class="text-center my-5">
                <h1 class="text-white fw-bolder" style="font-size: 100px ;">Anjez</h1>
                <p class="text-white mb-0">let the chaos end and Anjez your tasks!</p>
            </div>
        </header>

        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6" id="about">
                        <h2>What is Anjez?</h2>
                        <p class="lead">Anjez: <span style="font-size: 15px;"> (v.) </span>arabic word which means complete or fulfill </p>
                        <p class="mb-0"> 
                            Anjez is your best sulotion to organize family-based Tasks. 
                            With our well-designed, easy-to-use To-Do List, you will be able to assign tasks to each member of your family. 
                            Keep track of everything and sort out the chaos!
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5 rounded" style="background-color: #C5CAD7;">

                <h2>3 Easy steps to get started</h2>

                <div class="row justify-content-center p-5">
                    <div class="col-3">
                        <h3 class="text-white fw-bolder" style="background-color: #444A58;">
                                Step 1 
                        </h3>
                       
                        <p class="mb-0"> 
                            Register yourself as Parent and add all your family members.
                        </p>
                    </div>
                    <div class="col-3">

                        <h3 class="text-white fw-bolder" style="background-color: #444A58;">
                                Step 2
                        </h3>
                       
                        <p class="mb-0"> 
                            Assign as many tasks as needed to each one and manage them.
                        </p>
                    </div>
                    <div class="col-3">

                        <h3 class="text-white fw-bolder" style="background-color: #444A58;">
                               step 3 
                        </h3>
                       
                        <p class="mb-0"> 
                            Once they are done with the task, you will get notified. delete the finished tasks and assign new ones.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Header - set the background image for the header in the line below-->
        <header class="py-5 bg-image-full" style="background-image: url('https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80')">
            <div class="text-center my-5" id="contact">
                <h1 class="text-black fs-3 fw-bolder">Contast Us</h1>
                <p class="text-black-50 mb-0">
                    Jana Kassas <br> Media Informatics <br> Mtrkl. nr: 5458408 <br> <a href="mailto:jana.kassas@uni.student-tuebingen.de"> jana.kassas@uni.student-tuebingen.de</a>
                </p>
            </div>
        </header>
    </div>
</body>
</html>
