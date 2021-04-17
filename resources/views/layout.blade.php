<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
        @yield('container')
    </div>
</body>
<div class="modal" data-modal="remove" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Tem certeza que deseja excluir?</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-footer">
           <form id="formDel" method="post" action="{{route('delete')}}">
                <input class="btn btn-danger" type="submit" value="Delete"  />
                <input type="hidden" name="id" value="" id="delete">
                @method('delete')
                @csrf
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>
</body>
<script src="{{asset('js/app.js')}}"></script>
<script>
    (function() {

        const limpar = document.getElementById('limpar');
        
        function limparImput() {
            document.getElementById('status').value = "";
            document.getElementById('nome').value = "";
            document.getElementById('login').value = "";
            document.getElementById('senha').value = "";
            document.getElementById('senha_repitida').value = "";
        }

        limpar.addEventListener('click',e => {
            limparImput();
        });


        $("#excluir").click(function(){
            const data = this;
            const id = (data.getAttribute('data-id'));
            const form = document.getElementById('formDel');
            const del = document.getElementById('delete');
            del.setAttribute('value', id);
            $(".modal").modal();
            return;
        });

        document.addEventListener('focusout', (e) => {
            const senhaInput = e.target;
            if (senhaInput.id === 'senha' || senhaInput.id === 'senha_repitida')
            if(senhaInput.value.length < 5) {
                senhaInput.parentNode.children[1].innerText = ' senha tem que conter entre 5 e 10 caracteres';
                return;
            }
        });

        function senhasIguais(senha, senhaRepetida) {
            if (senha.value === senhaRepetida.value) return true
            senha.parentNode.children.namedItem('input-erro').innerText = ' Senhas não são iguais';
            senhaRepetida.parentNode.children.namedItem('input-erro').innerText = ' Senhas não são iguais'
            return false;
        }

        document.addEventListener('submit', async (e) => {
            if (e.target.classList.contains('formEditar')) {
                e.preventDefault();
                const formEntries = e.target.children[0].children;
                const senha = formEntries[2].children.namedItem('senha');
                const senhaRepetida = formEntries[3].children.namedItem('senha_repitida');
                if (senhasIguais(senha, senhaRepetida) === false) return;
                const config = {
                    'method': 'PUT',
                    headers: new Headers({
                        'Content-Type': 'application/json',
                    }),
                    body: JSON.stringify({
                        nome: formEntries[0].children.namedItem('nome').value,
                        login: formEntries[1].children.namedItem('login').value,
                        senha: senha.value,
                        status: formEntries[4].children[0].children.namedItem("status").value,
                        _token: formEntries[6].value
                    }),
                }; 
                const response = await fetch(`http://127.0.0.1:8000/edit/${formEntries[5].value}`, config);
                const data = await response.text();   
                if (response.status !== 200) {
                    alert("Erro ao editar");
                    return;
                }
                alert(data);
                return; 
            }
            return;
        });

        document.addEventListener('submit', async (e) => {
            if (e.target.classList.contains('formCadastrar')) {
                e.preventDefault();
                const formEntries = e.target.children[0].children;
                const senha = formEntries[2].children.namedItem('senha');
                const senhaRepetida = formEntries[3].children.namedItem('senha_repitida');
                if (!senhasIguais(senha, senhaRepetida)) return;
                const config = {
                    'method': 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json',
                    }),
                    body: JSON.stringify({
                        nome: formEntries[0].children.namedItem('nome').value,
                        login: formEntries[1].children.namedItem('login').value,
                        senha: senha.value,
                        status: formEntries[4].children[0].children.namedItem("status").value,
                        _token: formEntries[5].value
                    }),
                }; 
                const response = await fetch(`http://127.0.0.1:8000/save`, config);
                const data = await response.text();
                if (response.status !== 200) {
                    alert("Erro ao editar");
                    return;
                }
                limparImput();
                alert(data);
                return;
            }
            return;
        });
    }())
    
</script>
</html>