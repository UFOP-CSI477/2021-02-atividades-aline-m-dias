@extends('app')

@section('conteudo')

<div class="container">
    <main>
        
            <h2>Cadastrar a manutenção realizada</h2>

            {{-- <form action="{{ route('manutencoes.store') }}" method="POST">

                @csrf

                <div class="">
                    <div class="">
                        <label for="equipamento_id" class="form-label">Nome do Equipamento</label>
                        <select class="form-select" id="equipamento_id" name="equipamento_id">
                            <option value="select">Selecione</option>
                            @foreach($equipamentos as $e)
                                <option value="{{ $e->id }}">{{ $e->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                 
                     @yield('formulario')
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
            </form> --}}
        
</div>
</main>

</div> 

@endsection