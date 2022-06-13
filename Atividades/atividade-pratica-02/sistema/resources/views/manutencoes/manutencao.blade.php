@extends('app')

@section('conteudo')
    
     <h2>Cadastrar a manutenção realizada</h2>

    <form action="{{ route('manutencoes.store')}}" method="POST">

        @csrf
                    
         <div class=" mb-3">
                        
            {{-- <label for="equipamento_id" class="form-label"> Nome do Equipamento</label>
            <select class="form-select" id="equipamento_id" name="equipamento_id">
                <option value="select">Selecione</option>      
                    @foreach($equipamentos as $e)         
                    <option value="{{ $e->nome }}">{{ $e->nome }}</option>
                    @endforeach  
                    {{-- <option value="1">Equipamento 1</option>
                    <option value="2"> Equipamento 2</option>
                    <option value="3"> Equipamento 3</option> --}}
            {{-- </select> --}}
                        
        </div> 
                
        @yield('formulario')
                
        {{-- <div>
            <button class="btn btn-primary" type="submit">Cadastrar</button>
        </div>
                 --}}
    </form>
    
@endsection