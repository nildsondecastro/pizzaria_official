<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use App\Models\User;
use App\Models\Pedido;
use App\Models\Carrinho;
use App\Models\Itemdopedido;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCarrinho()
    {
        if(!Auth::user()->permission->cliente){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }

        $carrinho = Auth::user()->carrinho;
        $soma = 0;

        foreach ($carrinho->itens as $i) {
            $soma += $i->itp_valor;
        }
        
        $carrinho->car_valor = $soma;
        $carrinho->save();

        return view('pedido.carrinho');
    }

    public function postAdd2Sabores(Request $request)
    {
        if(!Auth::user()->permission->cliente){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }

        $aux = $request->all();

        $sabor1 = Produto::find(substr($aux['selectSabor1'], 7));
        $sem1 = "";
        $sabor2 = Produto::find(substr($aux['selectSabor2'], 7));
        $sem2 = "";

        if ($sabor1->pro_valor > $sabor2->pro_valor) {
            $preco = $sabor1->pro_valor;
        }else{
            $preco = $sabor2->pro_valor;
        }

        foreach ($sabor1->ingredientes as $i) {
            $chave = substr($aux['selectSabor1'], 0, 8)."_".$i->ing_id;
            if (!array_key_exists($chave, $aux)) {
                $sem1 = $sem1."sem ".$i->ing_nome.", ";
            }
        }

        foreach ($sabor2->ingredientes as $i) {
            $chave = substr($aux['selectSabor2'], 0, 8)."_".$i->ing_id;
            if (!array_key_exists($chave, $aux)) {
                $sem2 = $sem2."sem ".$i->ing_nome.", ";
            }
        }
        if(!$sem1){
            $sem1 = " completa.";
        }
        if(!$sem2){
            $sem2 = " completa.";
        }

        $nome = "Metade ".$sabor1->pro_nome." ".$sem1." e Metade ".$sabor2->pro_nome." ".$sem2;

        $cart = Carrinho::where('usr_id', Auth::user()->id)->first();
        if(!$cart){
            $cart = Carrinho::create([
                'usr_id' => Auth::user()->id,
            ]);
        }

        Itemdopedido::create([
            'itp_nome'  => $nome,     
            'itp_valor' => $preco,    
            'car_id'    => $cart->car_id,
        ]);
        $cart->car_valor += $preco;
        $cart->save();

        return redirect()->route('cardapio')->with('mensagem', 'Item adicionado ao carrinho');
        
    }

    public function postAddItem(Request $request)
    {
        if(!Auth::user()->permission->cliente){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição');
        }

        $aux = $request->all();
        
        $produto = Produto::find($aux['pro_id']);
        $sem = "";

        foreach ($produto->ingredientes as $i) {
            $chave = $aux['pro_id']."_".$i->ing_id;
            if (!array_key_exists($chave, $aux)) {
                $sem = $sem."sem ".$i->ing_nome.", ";
            }
        }
        if(!$sem){
            $sem = "completa.";
        }
        
        $nome = $produto->pro_nome." ".$sem;

        $cart = Carrinho::where('usr_id', Auth::user()->id)->first();
        if(!$cart){
            $cart = Carrinho::create([
                'usr_id' => Auth::user()->id,
            ]);
        }

        Itemdopedido::create([
            'itp_nome'  => $nome,     
            'itp_valor' => $produto->pro_valor,    
            'car_id'    => $cart->car_id,
        ]);
        $cart->car_valor += $produto->pro_valor;
        $cart->save();

        return redirect()->route('cardapio')->with('mensagem', 'Item adicionado ao carrinho');
        
    }

    public function deleteItem(Request $request)
    {
        if(!Auth::user()->permission->cliente){
            return redirect()->back()->with('mensagem_erro', 'Seu usuário não tem permissão para está requisição.');
        }
        if(Auth::user()->carrinho->car_id != $request->car_id){
            return redirect()->back()->with('mensagem_erro', 'Algum erro ocorreu.');
        }

        $item = Itemdopedido::find($request->itp_id);
        $item->delete();

        return redirect()->route('carrinho')->with('mensagem', 'Item removido do carrinho');
        
    }

}
