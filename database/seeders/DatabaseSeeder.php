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
            'password' => Hash::make('12345678'),
        ]);

        Permission::create([
            'cliente'        => true,
            'funcionario'    => true,
            'gerente'        => true,
            'administrador'  => true,
            'usr_id'         => 1,
        ]);

        Homepage::create([
            'hom_faixa_decorativa' => 'Estamos com promoções de Natal. Venha conferir.',     
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
