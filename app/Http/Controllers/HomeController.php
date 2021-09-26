<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Homepage;
use App\Models\User;
use App\Models\Produto;
use App\Models\Ingrediente;

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

    public function cardapio()
    {
        $pizzas = Produto::all();
        return view('cardapio.index', compact('pizzas'));
    }
    

    public function teste()
    {
        $p = Produto::find(1);
        dd($p, $p->ingredientes);
    }


    
}
