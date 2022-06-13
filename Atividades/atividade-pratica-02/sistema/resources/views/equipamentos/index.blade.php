@extends('app')

@section('conteudo')

    <h2>Lista de Equipamentos</h2>

    <a class="btn btn-primary" href="{{ route('equipamentos.create') }}">Incluir</a>

    <table class="table table-stripped table-hover">

        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                @if(Auth::check())
                <th>Ação</th>
                @endif
            </tr>
        </thead>

        <tbody>

             @foreach($equipamentos as $e)

            <tr>
                <td>{{ $e->id }}</td>
                {{-- <td><a href="{{ route('equipamentos.show', $e->id) }}">{{ $e->nome }}</a></td> --}}
                <td>{{ $e->nome}}</td>
                
                @if(Auth::check())
        
                <td>
                    <div class="">
                        <div class="">
                            <a href="{{ route('equipamentos.edit', $e->id) }}" class="btn btn-primary">Editar</a>
                        </div>
                        <div class="">
                            <form action="{{ route('equipamentos.destroy', $e->id) }}" method="post">

                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Excluir" class="btn btn-danger">

                            </form>
                        </div>
                    </div>
                </td>
        
            </td>
            @endif
            </tr>

            @endforeach
        
        </tbody>

    </table>

    {{-- {{ $equipamento->links() }}  --}}

@endsection