<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Icon from: https://icons.getbootstrap.com/icons/trophy/ -->
    <link rel="icon" href="{{ asset('trophy.svg') }}" type="image/svg+xml">
</head>

<body>

    <!-- Estrutura da pagina -->
    <!-- Cabecalho -->
    <!-- Adapted from: https://getbootstrap.com/docs/5.1/examples/headers/ -->
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <i class="bi bi-bag-heart" style="font-size: 3rem; color: #EB5353;"></i>
            </a>

            <!-- Opcoes -->
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                {{-- <li><a href="{{ route('home') }}" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="{{ route('estados.index') }}" class="nav-link px-2 link-dark">Estados</a></li>
                <li><a href="{{ route('cidades.index') }}" class="nav-link px-2 link-dark">Cidades</a></li> --}}
            </ul>

            <div class="col-md-3 text-end">
                
                @if(Auth::check())
                    <!-- Logged -->
                    {{ Auth::user()->name }}
                    <!-- Logout -->
                    {{-- <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form> --}}
                @else                                            
                    <!-- Login -->
                    {{-- <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Sign-up</a> --}}
                @endif
            </div>


        </header>
    </div>

    <!-- Mensagem -->
    @if(session('mensagem'))
    <div class="container">
        <div class="alert alert-success">
            {{ session('mensagem') }}
        </div>
    </div>
    @endif

    @if(session('mensagem-erro'))
    <div class="container">
        <div class="alert alert-danger">
            {{ session('mensagem-erro') }}
        </div>
    </div>
    @endif    

    <!-- Erros -->
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <!-- CONTEUDO DA PAGINA -->
    <div id="content" class="container">
        @yield('conteudo')
    </div>

    <!-- Rodape -->
    <!-- Adapted from: https://getbootstrap.com/docs/5.1/examples/footers/ -->
    <div class="container">
        <footer class="container d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <!-- https://laravel.com/docs/9.x/blade#displaying-unescaped-data -->
                <span class="text-center text-muted">{!! env('COMPANY', 'Company, Inc') !!}</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a href="https://github.com/fboliveira/CSI477-Sistemas-Web" target="_blank"><i class="bi bi-github fs-4 text-muted"></i></a></li>
                   
            </ul>
        </footer>
    </div>

    <!-- CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- JS -->
    <script src=" {{ asset('js/bootstrap.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>