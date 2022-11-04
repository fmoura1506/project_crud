<link href="/css/app.css" rel="stylesheet">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <div class="collapse navbar-collapse d-flex justify-content-start" id="navbarNav">
        </div>
                <div class="collapse navbar-collapse d-flex justify-content-end">
                <div>
        </div>
    </nav>

    

    <div class="row justify-content-center align-items-center vh-100 vw-100">
        <div class="col-auto">
            <form action={{ route('formulario.update', [$formulario->id]) }} method="post">
                    @method('PUT')
                    @csrf 
                    <p> Selecione o motivo do contato </p>

                    <select name="opcao" class="form-select" aria-label="Default select example" value="{{ old('motivo_contato') }}">
                        <option value=" ">Escolha a opção</option>
                        <option value="Reclamação" @if ($formulario->opcao == 'Reclamação') selected @endif>Reclamação</option>
                        <option value="Elógio" @if ($formulario->opcao == 'Elógio') selected @endif >Elógio</option>
                        <option value="Sugestão" @if ($formulario->opcao == 'Sugestão') selected @endif >Sugestão</option>
                    </select>

                    <div style="color:red">
                    {{ $errors->has('opcao') ? $errors->first('opcao') : '' }}
                    </div>

                    <div class="col-md-12">
                        <label for="exampleFormControlTextarea1" class="form-label">Digite um comentário</label>
                        <textarea name="mensagem_contato" value="{{ old('mensagem_contato')}}" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $formulario->mensagem_contato}} </textarea>
                    <div style="color:red">
                    {{ $errors->has('mensagem_contato') ? $errors->first('mensagem_contato') : '' }}
                    </div>
                    </div>
                    <br>
                    
                    <button type="submit" class="btn btn-success center">Clique aqui para enviar</button>

          <form>
                    <br> <br>
                    <form action={{ route('formulario.consulta') }}>
                        <button class="btn btn-light center"> Voltar </button>
                    </form>
        </div>
                    
    </div>


<style>
    .center {
    position: absolute;
    right: 44%;     
    }
</style>
