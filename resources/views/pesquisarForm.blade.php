<link href="/css/app.css" rel="stylesheet">


        <div class="center">
            <form action={{ route('formulario.pesquisarForm') }} method="GET">
                <div class="form-group">
                    <label for="exampleInputEmail1">Digite o Formulário que deseja pesquisar</label>
                    <br>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="search"
                    placeholder="Digite o ID ou a opção">
                </div>
                <br>
                    <button type="submit" class="btn btn-primary">Procurar</button>                
            </form>

                    <form action={{ route('formulario.create') }}>
                        <button class="btn btn-outline-warning"> Voltar </button>
                    </form>


                    @if ( $search != null ) 
                            <li> 
                            @forelse ($pesquisa as $pesquisar)
                             ID: {{ $pesquisar->id }} - Mensagem: {{ $pesquisar->opcao }}
                            @empty
                            Nenhum registro foi encontrado
                            @endforelse
                     
                    @else 
                        Digite um registro para busca.
                    @endif 

        </div>

        <br>
        <br>
                   
<style>
    .center {
    position: absolute;
    right: 44%;   
    }
</style>
    