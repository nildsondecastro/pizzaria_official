<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPerfil()
    {
        return view('perfil.perfil');
    }

    public function postSenha(Request $request)
    {
        $rules = [
            'password' => 'required|min:8|confirmed',
        ];
        $request->validate($rules);

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('perfil'))->with('mensagem', 'Sucesso na atualização da senha!');
    }

    public function postDados(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:120',
            'email' => 'required|max:250|unique:users,email,'.Auth::user()->id
        ];
        $mensagens = [
            'email.required' => 'o campo nome de usuário é obrigatório',
            //'email.unique' => 'o nome de usuário já existe na base',
        ];
        
        $request->validate($rules, $mensagens);
        
        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->save();
        return redirect(route('perfil'))->with('mensagem', 'Sucesso na atualização dos dados!');
    }

    //falta corrigir
    public function getUsers()
    {
        $aux = DB::table('permissions')
            ->where('usr_id', '=', Auth::user()->id)
            ->first();
        if(!$aux->show_users){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }
        
        $users = DB::table('users')->orderBy('status', 'DESC')->orderBy('id', 'ASC')->get();
        return view('perfil.index', compact('users'));
    }

    public function getEdit($id)
    {
        $aux = DB::table('permissions')
            ->where('usr_id', '=', Auth::user()->id)
            ->first();
        if(!$aux->edit_users){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }
        
        $u = DB::table('users')
            ->where('id', '=', $id)
            ->first();//user
        $p = DB::table('permissions')
            ->where('usr_id', '=', $id)
            ->first();
        return view('perfil.edit', compact('u', 'p'));
    }

    public function postUserSenha(Request $request, $id)
    {
        $aux = DB::table('permissions')
            ->where('usr_id', '=', Auth::user()->id)
            ->first();
        if(!$aux->edit_users){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }
        
        if($request->id != $id){
            return redirect()->back()->with('mensagem_erro', 'Algum erro ocorreu');
        }
        $rules = [
            'password' => 'required|min:8|confirmed',
        ];
        $request->validate($rules);

        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('user.edit', ['id' => $request->id]))->with('mensagem', 'Sucesso na atualização da senha!');
    }

    public function postUserDados(Request $request, $id)
    {
        $aux = DB::table('permissions')
            ->where('usr_id', '=', Auth::user()->id)
            ->first();
        if(!$aux->edit_users){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }
        
        if($request->id != $id){
            return redirect()->back()->with('mensagem_erro', 'Algum erro ocorreu');
        }
        $rules = [
            'name' => 'required|min:3|max:120',
            'email' => 'required|max:250|unique:users,email,'.$request->id
        ];
        $mensagens = [
            'email.required' => 'o campo nome de usuário é obrigatório',
            //'email.unique' => 'o nome de usuário já existe na base',
        ];
        
        $request->validate($rules, $mensagens);
        
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->save();
        return redirect(route('user.edit', ['id' => $request->id]))->with('mensagem', 'Sucesso na atualização dos dados!');
    }

    public function postUserStatus(Request $request, $id)
    {
        $aux = DB::table('permissions')
            ->where('usr_id', '=', Auth::user()->id)
            ->first();
        if(!$aux->restrict_users){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }
        
        if($request->id != $id){
            return redirect()->back()->with('mensagem_erro', 'Algum erro ocorreu');
        }
        
        $user = User::find($request->id);

        if($user->status){
            $user->status = false;
        }else{
            $user->status = true;
        }
        
        $user->save();
        return redirect(route('user.edit', ['id' => $request->id]))->with('mensagem', 'Sucesso na atualização dos dados!');
    }

    

    

    public function getCreate()
    {
        $aux = DB::table('permissions')
            ->where('usr_id', '=', Auth::user()->id)
            ->first();
        if(!$aux->add_users){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }
        
        return view('perfil.register');
    }

    public function postStore(Request $request)
    {
        $aux = DB::table('permissions')
            ->where('usr_id', '=', Auth::user()->id)
            ->first();
        if(!$aux->add_users){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }
        
        $show_users = $request->show_users ? true : false ;
        $add_users = $request->add_users ? true : false ;
        $edit_users = $request->edit_users ? true : false ;
        $restrict_users = $request->restrict_users ? true : false ;
        $estoque = $request->estoque ? true : false ;
        $permission_os = $request->os ? true : false ;
        
        $rules = [
            'name' => 'required|min:3|max:120',
            'email' => 'required|unique:users|email|max:250',
            'password' => 'required|min:8|confirmed',
        ];
        $mensagens = [
            'email.required' => 'o nome de usuário é obrigatório',
            'email.max'      => 'o nome de usuário está muito longo',
            'email.unique'   => 'o nome de usuário já existe na base',
        ];
        
        $request->validate($rules, $mensagens);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);
        Permission::create([
            'show_users'        => $show_users,
            'add_users'         => $add_users,
            'edit_users'        => $edit_users,
            'restrict_users'    => $restrict_users,
            'estoque'           => $estoque,
            'os'                => $permission_os,
            'usr_id'            => $user->id,
            
        ]);
        return redirect(route('users'))->with('mensagem', 'Sucesso no Registro do Usuário '.$user->name.'!');
    }
}
