@extends('layout')

@section('container')
    

<div>
    <head>
        <h1 class="text-center">Cadastro de pessoas</h1>
    </head>
    <div class="pb-5">
        <form action="{{route('find')}}" method="POST">
            <fieldset>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome">
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
                        <button class="btn btn-primary" type="submit">Filtrar</button>
                        <button class="btn btn-danger" type="button" id="limpar">Limpar</button>
                        <a  class="btn btn-success" href="{{route('create')}}">Novo</a>
                    </div>
                </div>
            </fieldset>
            @csrf
        </form>
        
    </div>
    
    <div></div>
    <div class="d-flex flex-column">
        
        <section>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Login</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->login }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a class="btn btn-info" href="{{route('show', $item->id)}}">Editar</a>
                                <button type="button" class="btn btn-danger" data-id="{{$item->id}}" id="excluir">Excluir</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
            </div>
        </section>
    </div>
</div>


@endsection