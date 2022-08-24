<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts Google-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
        <!-- Application CSS -->
        <link rel="stylesheet" href="/css/style.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div id="navbar" class="container-fluid">
                    <a href="/" class="navbar-brand">
                        <img src="/img/icon-em.svg" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>            
                    <div id="navbar-items" class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/" class="nav-link">Projetos</a>
                            </li>
                            <li class="nav-item">
                                <a href="/about" class="nav-link">Sobre</a>
                            </li>
                            @auth
                                <li class="nav-item">
                                    <a href="/projects/create" class="nav-link">Criar Projeto</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/dashboard" class="nav-link">Meus Projetos</a>
                                </li>
                                <li class="nav-item">
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <a href="/logout" class="nav-link" onclick="event.preventDefault();
                                        this.closest('form').submit();">Sair</a>
                                    </form>
                                </li>
                            @endauth
                            @guest
                                
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>    
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <div class="msg alert alert-success alert-dismissible fade show" role="alert">
                            {{session('msg')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>Pedro Hilan &copy; 2022</p>
        </footer>
        <!-- Application JS -->
        <script src="/js/scripts.js"></script>
        <!-- Bootstrap JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <!-- IONICONS -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    </body>
</html>