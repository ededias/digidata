@extends('layout')
@section('container')
<div>
    <head>
        <h1>Criar pessoa</h1>
    </head>
    <form action="." class="formCadastrar">
        <fieldset>
            <div class="form-group">
                <label for="marca">Nome</label>
                <input class="form-control" id="nome" type="text" name="nome">
            </div>
            <div class="form-group">
                <label for="modelo">Login</label>
                    <input class="form-control" id="login" type="text" name="login">
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
            
            @csrf
            
        </fieldset>
    </form>
</div>

@endsection