<!doctype html>
    <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/app.css" rel="stylesheet">
    
    <title>Editar Login</title>
  </head>
  <body>

        <div class="row justify-content-center align-items-center vh-100 vw-100">
             <div class="col-auto">
              <form action={{ route('login.updateLogin', [$login->id])}} method="post" >
                    @method('PUT')
                    @csrf  
                    <div class="col-md-12" >
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="email" value="{{ $login->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                      <div style="color:red">
                      {{ $errors->has('email') ? $errors->first('email') : '' }}
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label for="exampleInputPassword1" class="form-label">Senha</label>
                      <input type="password" value="{{ old('password')}}" class="form-control" id="exampleInputPassword1" name="password">
                      <div style="color:red">
                      {{ $errors->has('password') ? $errors->first('password') : '' }}
                      </div>
                    </div>
                
                    <br>
                    <button type="submit" class="btn btn-outline-primary">Cadastrar novo e-mail e senha </button>

              </form>
                    <br>    
                    <form action={{ route('login.indexLogin') }}>
                        <button class="btn btn-outline-warning"> Voltar </button>
                    </form>

              <br>
            </div>
        </div>

  </body>
</html>

