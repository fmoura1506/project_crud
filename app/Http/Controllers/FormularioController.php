<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Login;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Login::findOrFail($_SESSION['user_id']);
        return view ('formulario', compact('user')); 
        
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
            'opcao' => 'required',
            'mensagem_contato' => 'required'
        ];

        $feedback =[
            'opcao.required' => 'O campo opção é obrigatório',
            'mensagem_contato.required' => 'O campo mensagem é obrigatório'
        ];

        $request->validate($regras, $feedback);

        Formulario::create($request->all());
            
        return redirect()->route('login.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $formulario = Formulario::findOrFail($id);
        return view ('editarForm', compact('formulario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $regras = [
            'opcao' => 'required',
            'mensagem_contato' => 'required'
        ];

        $feedback =[
            'opcao.required' => 'O campo opção é obrigatório',
            'mensagem_contato.required' => 'O campo mensagem é obrigatório'
        ];


        $request->validate($regras, $feedback);

        $formulario = Formulario::findOrFail($id);

        $formulario->update($request->all());

        //return "Formulário atualizado com sucesso";

        return redirect()->route('formulario.consulta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $formulario = Formulario::findOrFail($id);
        return view('excluirForm', compact('formulario'));
    }

    public function destroy($id)
    {
        //
        $formulario = Formulario::findOrFail($id);
        $formulario->delete();

        return redirect()->route('formulario.consulta');

    }

    public function gerenciar ()
    {
        session_start();
        $user = Login::findOrFail($_SESSION['user_id']);
       
        return view ('gerenciar', compact('user'));
    }

    public function gate ()
    {
        session_start();
        $user = Login::findOrFail($_SESSION['user_id']);
       
        return view ('gate', compact('user'));
    }

    public function consulta ()
    {
        
        $user = Login::findOrFail($_SESSION['user_id']);
        if($user->cannot('verAdm', [$user, Login::class])) {
            abort (403,'Usuário não autorizado');
        }

        $index = Formulario::get();

        return view('consultarForm', compact('index'));
    }


    public function pesquisarForm (Request $request) {

        $user = Login::findOrFail($_SESSION['user_id']);
        if($user->cannot('verAdm', [$user, Login::class])) {
            abort (403,'Usuário não autorizado');
        }

        $search = $request->search;

        $pesquisa = Formulario::where('id', '=', "{$search}") //faz a busca exata
                            ->orWhere('opcao', 'like', "%{$search}%") 
                            ->get();

        return view('pesquisarForm', compact('pesquisa', 'search'));
    }
}