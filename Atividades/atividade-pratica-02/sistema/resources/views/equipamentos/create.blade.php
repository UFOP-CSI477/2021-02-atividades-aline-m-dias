@extends('app')

@section('conteudo')


    <form action="{{ route('equipamentos.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control 
            @error('nome')
                is-invalid
            @enderror" value="{{ old('nome') }}">
        </div>

        <div class="mb-3">
            <input type="submit" value="Cadastrar" name="cadastrar" class="btn btn-primary">
            <input type="reset" value="Limpar" class="btn btn-danger">
        </div>


    </form>

@endsection