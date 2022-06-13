@extends('manutencoes.manutencao')

@section('formulario')

<form action="{{route('manutencoes.store') }}" method="POST">
    <div class="form-group">
        <label for="datalimite"> Data Limite</label>
        <input type="date" class="form-control" id="datalimite" name="datalimite" required="">
    </div>

    <div class="form-group">
        <label for="descricao" >Descrição</label>
        <textarea type="text" class="form-control" id="descricao" name="descricao" required=""></textarea>
    </div>

    <div class="form-group">
        <label for="tipo" >Tipo da manutenção</label>
        <select  class="form-control" id="tipo" name="tipo" >
            <option value="select">Selecione</option>
            <option value="1">Preventiva</option>
            <option value="2">Corretiva</option>
            <option value="3">Urgente</option>
        </select>
    </div>

    <div class="form-group">
        <label for="user_id" >Usuário</label>
        <input type="number" class="form-control" id="user_id" name="user_id" placeholder="" value="{{ Auth::user()->id }}" required="">
    </div>

    <div class="mb-3">
        <input type="submit" value="Cadastrar" name="cadastrar" class="btn btn-primary">
        <input type="reset" value="Limpar" class="btn btn-danger">
    </div>

</form>

@endsection