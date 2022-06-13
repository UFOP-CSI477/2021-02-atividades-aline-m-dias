<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar</title>

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
        </header>
    
     <!-- Validation Errors -->
     <div class="conteiner">
     <div class="form-group"></div>
     <x-auth-validation-errors class="mb-4" :errors="$errors" />


     <form method="POST" action="{{ route('register') }}">
         @csrf

         <!-- Name -->
         <div>
             <x-label for="name" :value="__('Name')" />

             <x-input id="name"  class="form-control" type="text" name="name" :value="old('name')" required autofocus />
         </div>

         <!-- Email Address -->
         <div class="mt-4">
             <x-label for="email" :value="__('Email')" />

             <x-input id="email"  class="form-control" type="email" name="email" :value="old('email')" required />
         </div>

         <!-- Password -->
         <div class="mt-4">
             <x-label for="password" :value="__('Password')" />

             <x-input id="password"  class="form-control"
                             type="password"
                             name="password"
                             required autocomplete="new-password" />
         </div>

         <!-- Confirm Password -->
         <div class="mt-4">
             <x-label for="password_confirmation" :value="__('Confirm Password')" />

             <x-input id="password_confirmation"  class="form-control"
                             type="password"
                             name="password_confirmation" required />
         </div>

         <div class="flex items-center justify-end mt-4">
             <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('home') }}">
                 {{ __('Already registered?') }}
             </a>

             <x-button class="btn btn-primary">
                 {{ __('Cadastrar') }}
             </x-button>
         </div>
     </form>
    </div>
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


{{-- <x-guest-layout> --}}
    {{-- <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot> --}}

{{--        
    </x-auth-card>
</x-guest-layout> --}}
