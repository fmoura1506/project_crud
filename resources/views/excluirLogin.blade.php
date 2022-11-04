<link href="/css/app.css" rel="stylesheet">

<title>Excluir Login</title>

        <div class="row justify-content-center align-items-center vh-100 vw-100">
            <div class="col-auto">
                
                <form action={{ route('login.destroyLogin', [$login->id]) }} method="post">
                    @csrf                   
                    <label for=""> Deseja mesmo excluir o email <b> {{ $login->email }} </b> ? </label> <br> <br>
                    <button class="btn btn-outline-success"> Sim </button> 
                </form>

                <form action={{ route('login.indexLogin') }}>
                    <button class="btn btn-outline-warning"> Voltar </button>
                </form>

            </div>
        </div>    