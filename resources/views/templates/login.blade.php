@extends('layout')

@section('container')
<div class="d-flex justify-content-center pt-5 mt-5">
    <div>
        <form action="{{route('loginValidade')}}" method="POST">
            <div class="form-group">
                <label for="login" >Login</label>
                <input type="text" class="form-control" name="login" id="login" class="id">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha">
            </div>
            @csrf
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">Entrar</button>
                <a class="btn btn-success ml-2"href="{{route('create')}}">Cadastrar</a>
            </div>
        </form>
    </div>
    
</div>
   
@endsection