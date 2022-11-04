<link href="/css/app.css" rel="stylesheet">


        <div class="row justify-content-center align-items-center vh-100 vw-100">
            <div class="col-auto">

                <form action={{ route('formulario.destroy', [$formulario->id]) }} method="post">
                    @csrf                   
                    <label for=""> Deseja mesmo excluir o formulário de <b> ID {{ $formulario->id }} </b> ? </label> <br> <br>
                    <button class="btn btn-outline-success"> Sim </button> 
                </form>

                <form action={{ route('formulario.consulta') }}>
                    <button class="btn btn-outline-warning"> Voltar </button>
                </form>
            </div>
        </div>        