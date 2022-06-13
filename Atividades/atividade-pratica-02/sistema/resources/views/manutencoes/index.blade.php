@extends('app')

@section('conteudo')

<div>

    <h2>Lista de Manutenções</h2>

    @if(Auth::check())
    <a class="btn btn-primary" href="{{ route('manutencoes.create') }} "> Cadastrar</a>
    @endif

    <table class="table table-stripped table-hover">

        <thead>
            <tr>
                <th>Codigo</th>
                <th>Data Limite</th>
                <th>Equipamento</th>
                <th>Usuário</th>
                <th>Tipo da Manutenção</th>
                <th>Descrição do problema</th>
                @if(Auth::check())
                <th>Ação</th>
                @endif
            </tr>
        </thead>

        <tbody>

            @foreach($manutencoes as $m)


            @php
                $tipo_name='';
                if($m->tipo == 1){
                    $tipo_name = 'Preventiva';
                }elseif($m->tipo == 2){
                    $tipo_name = 'Corretiva';
                }else{
                    $tipo_name = 'Urgente';
                }
            @endphp

            <tr>
                <td>{{ $m->id }}</td>
                <td>{{ $m->datalimite }}</td>
                <td>{{ $m->equipamento->nome }}</td>
                <td>{{ $m->user->name }}</td>
                <td>{{ $tipo_name }}</td>
                <td>{{ $m->descricao }}</td>
                @if(Auth::check())
                <td>
                    <div class="">
                        <div >
                            <a href="{{ route('manutencoes.edit', $m->id) }}" class="btn btn-primary">Editar</a>
                        </div>
                        <div class="p-2">
                            <form action="{{ route('manutencoes.destroy', $m->id) }}" method="post">

                                @csrf
                                @method('DELETE')

                                <input type="submit" value="Excluir" class="btn btn-danger">

                            </form>
                        </div>

                    </div>
                </td>
                @endif

            </tr>

            @endforeach

        </tbody>

    </table>

</div>


@endsection