<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\User;
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
    }
}
