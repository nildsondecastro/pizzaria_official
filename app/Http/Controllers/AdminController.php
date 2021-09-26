<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Models\User;

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
