<!doctype html>
    <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/app.css" rel="stylesheet">
    
    <title>Redefinir usuário</title>

  </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse d-flex justify-content-end">
              <ul>
                  <a class="nav-link active">{{$_SESSION['email']}}</a>
                  <a class="nav-link active" href="{{route('login.logout')}}">Sair</a>
              </ul>
                </div>  
        </nav>


        <div class="row justify-content-center align-items-center vh-100 vw-100">
             <div class="col-auto">
                <form action={{ route('login.update') }} method="post">
                    @method('PUT')
                    @csrf  
                      <div class="col-md-12" >
                        <label for="exampleInputEmail1" class="form-label">Digite o Email</label>
                        <input type="email" value="{{ old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        <div style="color:red">
                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                        </div>
                      </div>

                      <div class="col-md-12">
                        <label for="exampleInputPassword1" class="form-label">Digite a nova Senha</label>
                        <input type="password" value="{{ old('password')}}" class="form-control" id="exampleInputPassword1" name="password">
                        <div style="color:red">
                        {{ $errors->has('password') ? $errors->first('password') : '' }}
                        </div>
                      </div>

                      <br>
                      <button type="submit" class="btn btn-success">Clique aqui para cadastrar nova senha</button>
                </form>
                  <br>
                  <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('login.index')}}'" >Retornar</button>
              
             </div>
        </div>

    </body>
  </html>