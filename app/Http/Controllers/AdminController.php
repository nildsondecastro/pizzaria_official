<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\Homepage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        if(!Auth::user()->permission->administrador){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }
        
        $users = User::all();
        $clientes = $this->array_clientes();
        
        return view("admin.dashboard", compact('users', 'clientes'));
    }

    public function config()
    {
        if(!Auth::user()->permission->administrador){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }
        $homepage = Homepage::first();
        
        return view("admin.config", compact('homepage'));
    }

    public function postHomepage(Request $request)
    {
        if(!Auth::user()->permission->administrador){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }
        $homepage = Homepage::first();
        $homepage->hom_aberto = $request->hom_aberto;
        $homepage->hom_faixa_decorativa = $request->hom_faixa_decorativa;
        $homepage->hom_nome = $request->hom_nome;
        $homepage->hom_telefone = $request->hom_telefone;
        $homepage->hom_local = $request->hom_local;
        $homepage->hom_minimo = $request->hom_minimo;
        $homepage->hom_info1 = $request->hom_info1;
        $homepage->hom_info2 = $request->hom_info2;
        $homepage->hom_tempo_atendimento = $request->hom_tempo_atendimento;
        $homepage->save();
        
        return redirect()->route('home')->with('mensagem', 'Alteração Realizada. Verifique se a tela inicial está em conformidade.');
    }

    private function array_clientes()
    {
        $users = User::all();

        $clientes = [];
        $aux = Carbon::now()->subDays(30);
        $count = 0;
        
        foreach ($users as $u) {
            if ($u->created_at->startOfDay()->lessThanOrEqualTo($aux->startOfDay())) {
                $count++;
            }
        }
        for ($i=0; $i < 30; $i++) { 
            foreach ($users as $u) {
                if ($u->created_at->startOfDay()->toISOString() == $aux->startOfDay()->toISOString()) {
                    $count++;
                }
            }
            $clientes = Arr::add($clientes, "[".$i."]" , $count);
            $aux->addDay();
        }

        return $clientes;
    }

}
