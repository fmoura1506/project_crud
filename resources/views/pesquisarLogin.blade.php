<link href="/css/app.css" rel="stylesheet">


        <div class="center">
            <form action={{ route('login.pesquisarLogin') }} method="GET">
                <div class="form-group">
                    <label for="exampleInputEmail1">Digite o Email para pesquisar o login </label>
                    <br>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="search" value=" {{ $search }}">
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
                            ID: {{ $pesquisar->id }} - Email: {{ $pesquisar->email }} 
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
    