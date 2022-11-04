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

<h1> Consulta de formulários </h1>

<ul>
@foreach ($index as $formulario )
    <li>
        <b> ID: </b> {{$formulario->id }} -
        <b> Opção: </b> {{ $formulario->opcao }} - 
        <b> Comentário: </b> {{ $formulario->mensagem_contato }} <a href="{{ route('formulario.edit', [$formulario->id]) }}"> Editar</a> - 
                                                        <a href="{{ route('formulario.delete', [$formulario->id]) }}"> Excluir</a>
    </li>
    
@endforeach
</ul>