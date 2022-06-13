<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistemas de manutenção de equipamentos</title>
    <link rel="icon" href="{{ asset('trophy.svg') }}" type="image/svg+xml">
    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars-offcanvas/"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    
</head>
<body>

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                 
            {{-- icone da navbar --}} 
             <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <i class="bi bi-tools" style="font-size: 3rem; color: black;"></i>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a  href="{{route('principal')}}"    class="nav-link px-2 link-secondary">Home</a></li>
                <li><a  href="{{route('equipamentos.index')}}" class="nav-link px-2 link-dark"> Equipamentos</a></li>
                <li><a  href="{{route('manutencoes.index') }}" class="nav-link px-2 link-dark"> Manutenções</a></li>
            </ul>
            {{-- <li><a href="{{ route('') }}" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="{{ route('') }}" class="nav-link px-2 link-dark">Equipamentos</a></li>
                <li><a href="{{ route('') }}" class="nav-link px-2 link-dark">Manutenção</a></li> --}}             {{-- </ul>---}}

             <div class="col-md-3 text-end">
                
                @if(Auth::check())
                <!-- Logged -->
                {{ Auth::user()->name }}
                <!-- Logout -->
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Sair</button>
                </form>
            @else                                            
                <!-- Login -->
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Cadastrar</a>
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
 

    <div id="content" class="container">
        @yield('conteudo')
    </div>

    <!-- Rodape -->

    <div class="container">
        <footer class="container d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <!-- https://laravel.com/docs/9.x/blade#displaying-unescaped-data -->
                <span class="text-center text-muted">{!! env('COMPANY', 'Company, Inc') !!}</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a href="https://github.com/aline-m-dias" target="_blank"><i class="bi bi-github fs-4 text-muted"></i></a></li>
                      
            </ul>
        </footer>
    </div>

    <!-- CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- JS -->
    <script src=" {{ asset('js/bootstrap.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>