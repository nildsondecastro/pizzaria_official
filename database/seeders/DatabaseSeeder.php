<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\User;
use App\Models\Ingrediente;
use App\Models\Produto;
use Illuminate\Support\Facades\Hash;
use App\Models\Homepage;

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
            'ing_nome' => 'mussarela',
        ]);
        Ingrediente::create([
            'ing_nome' => 'calabresa',
        ]);
        Ingrediente::create([
            'ing_nome' => 'cebola',
        ]);
        Ingrediente::create([
            'ing_nome' => 'azeitona',
        ]);
        Ingrediente::create([
            'ing_nome' => 'orégano',
        ]);

        Ingrediente::create([
            'ing_nome' => 'frango',
        ]);
        Ingrediente::create([
            'ing_nome' => 'catupiry',
        ]);

        Ingrediente::create([
            'ing_nome' => 'presunto',
        ]);
        Ingrediente::create([
            'ing_nome' => 'ovo',
        ]);
        Ingrediente::create([
            'ing_nome' => 'pimentão',
        ]);

        Ingrediente::create([
            'ing_nome' => 'tomate',
        ]);

        Ingrediente::create([
            'ing_nome' => 'bacon',
        ]);
        Ingrediente::create([
            'ing_nome' => 'cebola',
        ]);

        Ingrediente::create([
            'ing_nome' => 'queijo prato',
        ]);
        Ingrediente::create([
            'ing_nome' => 'queijo coalho',
        ]);
        Ingrediente::create([
            'ing_nome' => 'cheddar',
        ]);

        Ingrediente::create([
            'ing_nome' => 'salsicha',
        ]);
        Ingrediente::create([
            'ing_nome' => 'batata palha',
        ]);
        Ingrediente::create([
            'ing_nome' => 'milho verde',
        ]);
    //Pizzas
        Produto::create([
            'pro_nome' => 'Calabresa',
            'pro_valor' => 22.00,
            'pro_status' => 1,
        ]);
        Produto::create([
            'pro_nome' => 'Frango',
            'pro_valor' => 22.00,
            'pro_status' => 1,
        ]);
        Produto::create([
            'pro_nome' => 'Portuguesa',
            'pro_valor' => 22.00,
            'pro_status' => 1,
        ]);
        Produto::create([
            'pro_nome' => 'Napolitana',
            'pro_valor' => 22.00,
            'pro_status' => 1,
        ]);
        Produto::create([
            'pro_nome' => 'Bacon',
            'pro_valor' => 22.00,
            'pro_status' => 1,
        ]);
        Produto::create([
            'pro_nome' => 'Hot Dog',
            'pro_valor' => 22.00,
            'pro_status' => 1,
        ]);
        Produto::create([
            'pro_nome' => '4 Queijos',
            'pro_valor' => 25.00,
            'pro_status' => 1,
        ]);
    }
}
