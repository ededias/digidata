@extends('layout')
@section('container')
<h1>Editar pessoa</h1>
<form action="." class="formEditar" method="POST">
    <fieldset>
        <div class="form-group">
            <label for="marca">Nome</label>
            <input class="form-control" id="nome" value="{{$user->name}}" type="text" name="nome">
        </div>
        <div class="form-group">
            <label for="modelo">Login</label>
            <input class="form-control" id="login" value="{{$user->login}}" type="text" name="login">
        </div>
        <div class="form-group">
            <label for="ano">Senha</label><span id="input-erro" class="text-danger">&nbsp;</span>
            <input class="form-control" id="senha" type="password" name="senha">
        </div>
        <div class="form-group">
            <label for="ano">Repetir senha</label><span id="input-erro" class="text-danger">&nbsp;</span>
            <input class="form-control" id="senha_repitida" type="password" name="senha_repitida">
        </div>
        <div class="form-inline">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="">STATUS</option>
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>
            <div class="ml-5">
                <button class="btn btn-primary" type="submit">Salvar</button>
                <button class="btn btn-danger" id="limpar">Limpar</button>
                <a class="btn btn-success" href="{{route('index')}}">Retornar</a>
            </div>
        </div>
        <input type="hidden" name="id" id="id" value="{{$user->id}}">
        @csrf
    </fieldset>
</form>
@endsection