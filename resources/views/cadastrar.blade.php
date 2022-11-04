<!doctype html>
    <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/app.css" rel="stylesheet">
    
    <title>Cadastrar usuário</title>

  </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <div class="collapse navbar-collapse d-flex justify-content-start" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{route('login.index')}}">Login</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link active" href="{{route('login.create')}}">Cadastrar</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link active" href="{{route('formulario.create')}}">Formulário</a>
                  </li>
              </ul>
            </div>
                         
          </div>
        </nav>


        <div class="row justify-content-center align-items-center vh-100 vw-100">
             <div class="col-auto">
                <form action={{ route('login.store') }} method="post"  >
                      @csrf  
                        <div class="col-md-12" >
                          <label for="exampleInputEmail1" class="form-label">Email</label>
                          <input type="email" value="{{ old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
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
                        <button type="submit" class="btn btn-success">Clique aqui para cadastrar</button>
                  </form>
                  <br>
                  <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('login.index')}}'" >Retornar</button>
              
             </div>
        </div>

    </body>
  </html>