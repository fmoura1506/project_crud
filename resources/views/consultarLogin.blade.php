<link href="/css/app.css" rel="stylesheet">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                <div class="collapse navbar-collapse d-flex justify-content-start" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('formulario.create')}}">Retornar</a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>

<h1> Consulta de login </h1>

<ul>
@foreach ($login as $logins )
    <li>
        <b> ID: </b> {{ $logins->id }} - 
        <b> Email: </b> {{ $logins->email }} <a href="{{ route('login.editarLogin', [$logins->id]) }}"> Editar </a> - 
                                            <a href="{{ route('login.excluirLogin', [$logins->id]) }}"> Excluir </a>                                   
    </li>
    
@endforeach
</ul>