<link href="/css/app.css" rel="stylesheet">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <div class="collapse navbar-collapse d-flex justify-content-start" id="navbarNav">
            <ul class="navbar-nav">
                @if($user->can('verAdm', [$user, Login::class]))
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('formulario.gerenciar')}}">'CAN'</a>
                    </li>
                @endif
                @if($user->can('gate', [$user, Login::class]))
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('formulario.gate')}}">Gate</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('login.index')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('login.redefinir')}}">Redefinir senha</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('login.indexLogin')}}">Consultar Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('formulario.consulta')}}">Consultar Formularios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('login.pesquisarLogin')}}">Pesquisar Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('formulario.pesquisarForm')}}">Pesquisar Formulario</a>
                </li>
            </ul>
        </div>
                <div class="collapse navbar-collapse d-flex justify-content-end">
                    <ul>
                        <a class="nav-link active">{{$_SESSION['email']}}</a>
                        <a class="nav-link active" href="{{route('login.logout')}}">Sair</a>
                    </ul>
                <div>
        </div>
    </nav>

    

    <div class="row justify-content-center align-items-center vh-100 vw-100">
        <div class="col-auto">
            <form action={{ route('formulario.store') }} method="post"  >
                    @csrf 
                    <p> Selecione o motivo do contato </p>

                    <select name="opcao" class="form-select" aria-label="Default select example" value="{{ old('motivo_contato')}}">
                        <option value=" ">Escolha a opção</option>
                        <option value="Reclamação">Reclamação</option>
                        <option value="Elógio">Elógio</option>
                        <option value="Sugestão">Sugestão</option>
                    </select>

                    <div style="color:red">
                    {{ $errors->has('opcao') ? $errors->first('opcao') : '' }}
                    </div>

                    <div class="col-md-12">
                        <label for="exampleFormControlTextarea1" class="form-label">Digite um comentário</label>
                        <textarea name="mensagem_contato" value="{{ old('mensagem_contato')}}" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    <div style="color:red">
                    {{ $errors->has('mensagem_contato') ? $errors->first('mensagem_contato') : '' }}
                    </div>
                    </div>
                    <br>
                    
                    <button type="submit" class="btn btn-success center">Clique aqui para enviar</button>

          <form>
        </div>
    </div>


<style>

        .center {
            position: absolute;
            
            right: 44%;
             
        }

</style>
