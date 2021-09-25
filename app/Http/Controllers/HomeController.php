<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Homepage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $homepage = Homepage::first();
        return view('home', compact('homepage'));
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
        $aux = Carbon::now()->subDays(31);
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
