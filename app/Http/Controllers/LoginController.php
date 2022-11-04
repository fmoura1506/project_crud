<?php

namespace App\Http\Controllers;


use App\Models\Login;
use CreateUsersTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view ('login');
    }

    public function indexLogin () {

        session_start();
        $user = Login::findOrFail($_SESSION['user_id']);
        if($user->cannot('verAdm', [$user, Login::class])) {
            abort (403,'Usuário não autorizado');
        }

        $login = Login::get();

        return view('consultarLogin', compact('login'));

    }

    public function autenticar (Request $request) 
    {
        
        $regras = [
            'email' => 'email',
            'password' => 'required'
        ];

        $feedback =[
            'email.email' => 'O campo e-mail é obrigatório',
            'password.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('email');
        $password = $request->get('password');

        $usuario = new Login();

        $existe = $usuario->where('email', $email)
                ->where('password', $password)
                ->get()
                ->first(); 
       
        if (isset ($existe->email)) {
        // Se o email e senha existir, começa a sessão e redireciona para o formulario contato
            session_start();
            $_SESSION['email'] = $existe->email;
            $_SESSION['user_id'] = $existe->id;
            
            return redirect()->route('formulario.create');

        }
        else {

            echo 'Usuário não existe | Senha incorreta';
            return view ('login');

        }

        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //       
       return view ('cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $regras = [
            'email' => 'email|unique:logins',
            'password' => 'required'
        ];

        $feedback =[
            'email.email' => 'O campo e-mail é obrigatório',
            'email.unique' => 'Este e-mail já existe',
            'password.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        Login::create($request->all());
        
        return redirect()->route('login.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        session_start();

        $login = Login::findOrFail($_SESSION['user_id']);

        $regras = [
            'email' => 'email',
            'password' => 'required'
        ];

        $feedback =[
            'email.email' => 'O campo e-mail é obrigatório',
            'password.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $login->update($request->all());

        return redirect()->route('formulario.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }

    public function logout () {

        //Faz o logout da sessão e redireciona para a tela de login 
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        return redirect()->route('login.index');
    }

    public function redefinir () {
    
        return view ('redefinir');
    }

    public function pesquisarLogin (Request $request) {
        
        //session_start();
        $user = Login::findOrFail($_SESSION['user_id']);
        if($user->cannot('verAdm', [$user, Login::class])) {
            abort (403,'Usuário não autorizado');
        }

        $search = $request->search;

        $pesquisa = Login::where('email', 'like', "%{$search}%")
                            ->get();

        return view('pesquisarLogin', compact('pesquisa', 'search'));
    }

    public function editarLogin ($id) {

        $login = Login::findOrFail($id);
        return view ('editarLogin', compact('login'));
        
    }

    public function updateLogin (Request $request, $id) {

        $regras = [
            'email' => 'email',
            'password' => 'required'
        ];

        $feedback =[
            'email.email' => 'O campo e-mail é obrigatório',
            'password.required' => 'O campo senha é obrigatório'
        ];


        $request->validate($regras, $feedback);

        $login = Login::findOrFail($id);

        $login->update($request->all());

        return redirect()->route('consultaLogin.contato');
    }

    public function excluirLogin ($id) {

        $login = Login::findOrFail($id);
        return view('excluirLogin', compact('login'));
    }

    public function destroyLogin ($id) {

        $login = Login::findOrFail($id);
        $login->delete();

        return redirect()->route('consultaLogin.indexLogin');
    }

}
