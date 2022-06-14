@extends('app')

@section('conteudo')
    
     <h2>Cadastrar a manutenção realizada</h2>

    <form action="{{ route('manutencoes.store')}}" method="POST">

        @csrf
                    
         <div class=" mb-3">         
            <label for="equipamento_id" class="form-label"> Nome do Equipamento</label>
         
            <select class="form-select" id="equipamento_id" name="equipamento_id">
                {{-- @foreach($equipamentos as $e)
                <option value="select">Selecione</option>
                   <option value="{{ $e->id }}">{{ $e->nome }}</option>
                @endforeach  --}}
            </select> 
                        
        </div> 
                
        @yield('formulario')
                
        {{-- <div>
            <button class="btn btn-primary" type="submit">Cadastrar</button>
        </div>
                 --}}
    </form>
    
@endsection