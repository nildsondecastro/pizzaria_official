<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\User;
use App\Models\Ingrediente;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\Itemdopedido;
use Illuminate\Support\Facades\Hash;
use App\Models\Homepage;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

    //usuários

        User::create([
            'name' => 'Nildson',
            'email' => 'nildsond@gmail.com',
            'telefone' => '(98)98800-0000',
            'endereco' => 'Endereço Teste',
            'password' => Hash::make('12345678'),
        ]);

        Permission::create([
            'cliente'        => true,
            'funcionario'    => true,
            'gerente'        => true,
            'administrador'  => true,
            'usr_id'         => 1,
        ]);

        User::create([
            'name' => 'Nildson',
            'email' => 'nildsond2@gmail.com',
            'password' => Hash::make('12345678'),
            'telefone' => '(98)98800-0000',
            'endereco' => 'Endereço Teste',
            'created_at' => now()->subDays(10),
        ]);

        Permission::create([
            'cliente'        => true,
            'funcionario'    => true,
            'gerente'        => true,
            'administrador'  => true,
            'usr_id'         => 2,
        ]);

        User::create([
            'name' => 'Nildson',
            'email' => 'nildsond3@gmail.com',
            'password' => Hash::make('12345678'),
            'telefone' => '(98)98800-0000',
            'endereco' => 'Endereço Teste',
            'created_at' => now()->subDays(11),
        ]);

        Permission::create([
            'cliente'        => true,
            'funcionario'    => true,
            'gerente'        => true,
            'administrador'  => true,
            'usr_id'         => 3,
        ]);

        for ($i=4; $i < 10; $i++) { 
            User::create([
                'name' => 'Nildson',
                'email' => 'nildsond'.$i.'@gmail.com',
                'telefone' => '(98)98800-0000',
                'endereco' => 'Endereço Teste',
                'password' => Hash::make('12345678'),
                'created_at' => now()->subDays(5*$i),
            ]);
    
            Permission::create([
                'cliente'        => true,
                'funcionario'    => true,
                'gerente'        => true,
                'administrador'  => true,
                'usr_id'         => $i,
            ]);
        }

        Homepage::create([
            'hom_background' => 'background1',
            'hom_faixa_decorativa' => 'Estamos com promoções de Natal. Venha conferir.',     
            'hom_aberto' => 'Aberto.',
            'hom_nome' => 'Pizzaria Teste',      
            'hom_telefone' => '(98) 986006378',     
            'hom_local' => 'São Luís', 
            'hom_minimo' => 'Pedido mínimo para entrega R$ 20,00',
            'hom_info1' => 'teste info 1',     
            'hom_info2' => 'teste info 2', 
            'hom_tempo_atendimento' => 'Atendimento de Terça à Domingo das 18:00 às 22:00 horas',
        ]);

    //Ingredientes
        Ingrediente::create([
            'ing_id' => 2,
            'ing_nome' => 'calabresa',
        ]);
        Ingrediente::create([
            'ing_id' => 3,
            'ing_nome' => 'cebola',
        ]);
        Ingrediente::create([
            'ing_id' => 4,
            'ing_nome' => 'azeitona',
        ]);

        Ingrediente::create([
            'ing_id' => 6,
            'ing_nome' => 'frango',
        ]);
        Ingrediente::create([
            'ing_id' => 7,
            'ing_nome' => 'catupiry',
        ]);

        Ingrediente::create([
            'ing_id' => 8,
            'ing_nome' => 'presunto',
        ]);
        Ingrediente::create([
            'ing_id' => 9,
            'ing_nome' => 'ovo',
        ]);
        Ingrediente::create([
            'ing_id' => 10,
            'ing_nome' => 'pimentão',
        ]);

        Ingrediente::create([
            'ing_id' => 11,
            'ing_nome' => 'tomate',
        ]);

        Ingrediente::create([
            'ing_id' => 12,
            'ing_nome' => 'bacon',
        ]);
        Ingrediente::create([
            'ing_id' => 13,
            'ing_nome' => 'cebola',
        ]);

        Ingrediente::create([
            'ing_id' => 14,
            'ing_nome' => 'queijo prato',
        ]);
        Ingrediente::create([
            'ing_id' => 15,
            'ing_nome' => 'queijo coalho',
        ]);
        Ingrediente::create([
            'ing_id' => 16,
            'ing_nome' => 'cheddar',
        ]);

        Ingrediente::create([
            'ing_id' => 17,
            'ing_nome' => 'salsicha',
        ]);
        Ingrediente::create([
            'ing_id' => 18,
            'ing_nome' => 'batata palha',
        ]);
        Ingrediente::create([
            'ing_id' => 19,
            'ing_nome' => 'milho verde',
        ]);
    //Pizzas
        Produto::create([
            'pro_id' => 1,
            'pro_nome' => 'Calabresa',
            'pro_valor' => 22.00,
            'pro_status' => 1,
        ]);
        Produto::create([
            'pro_id' => 2,
            'pro_nome' => 'Frango c/ Catupiry',
            'pro_valor' => 22.00,
            'pro_status' => 1,
        ]);
        Produto::create([
            'pro_id' => 3,
            'pro_nome' => 'Portuguesa',
            'pro_valor' => 22.00,
            'pro_status' => 1,
        ]);
        Produto::create([
            'pro_id' => 4,
            'pro_nome' => 'Napolitana',
            'pro_valor' => 22.00,
            'pro_status' => 1,
        ]);
        Produto::create([
            'pro_id' => 5,
            'pro_nome' => 'Bacon',
            'pro_valor' => 22.00,
            'pro_status' => 1,
        ]);
        Produto::create([
            'pro_id' => 6,
            'pro_nome' => 'Hot-Dog',
            'pro_valor' => 22.00,
            'pro_status' => 1,
        ]);
        Produto::create([
            'pro_id' => 7,
            'pro_nome' => '4 Queijos',
            'pro_valor' => 25.00,
            'pro_status' => 1,
        ]);

    //Pizzas e Ingredientes
    //pizza calabresa
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 1,
            'ing_id' => 2,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 1,
            'ing_id' => 3,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 1,
            'ing_id' => 4,
            'created_at' => now(),
        ]);

    //pizza frango c catupiry
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 2,
            'ing_id' => 6,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 2,
            'ing_id' => 7,
            'created_at' => now(),
        ]);
    //portuguesa
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 3,
            'ing_id' => 8,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 3,
            'ing_id' => 9,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 3,
            'ing_id' => 10,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 3,
            'ing_id' => 4,
            'created_at' => now(),
        ]);
    //Napolitana
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 4,
            'ing_id' => 8,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 4,
            'ing_id' => 11,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 4,
            'ing_id' => 4,
            'created_at' => now(),
        ]);
    //Bacon
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 5,
            'ing_id' => 12,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 5,
            'ing_id' => 13,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 5,
            'ing_id' => 4,
            'created_at' => now(),
        ]);

    //Hot-Dog
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 6,
            'ing_id' => 17,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 6,
            'ing_id' => 18,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 6,
            'ing_id' => 19,
            'created_at' => now(),
        ]);

    //4 Queijos
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 7,
            'ing_id' => 14,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 7,
            'ing_id' => 15,
            'created_at' => now(),
        ]);
        DB::table('produtos_ingredientes')->insert([
            'pro_id' => 7,
            'ing_id' => 16,
            'created_at' => now(),
        ]);

    //Pedido
        Pedido::create([
            'ped_taxa' => 7,    
            'ped_valor' => 25,       
            'ped_total' => 32,  
            'ped_endereco' => 'teste',       
            'ped_telefone' => 'teste',      
            'ped_status' => 'realizado', 
            'usr_id' => 1,
        ]);
        Pedido::create([
            'ped_taxa' => 7,    
            'ped_valor' => 22,       
            'ped_total' => 29,  
            'ped_endereco' => 'teste',       
            'ped_telefone' => 'teste',      
            'ped_status' => 'realizado', 
            'usr_id' => 1,
        ]);
        Itemdopedido::create([
            'itp_nome' => 'pizza 1 teste',
            'itp_valor' => 22,
            'ped_id' => 1,
        ]);
        Itemdopedido::create([
            'itp_nome' => 'pizza 2 teste',
            'itp_valor' => 22,
            'ped_id' => 1,
        ]);
        Itemdopedido::create([
            'itp_nome' => 'pizza 3 teste',
            'itp_valor' => 22,
            'ped_id' => 1,
        ]);
    }
}
