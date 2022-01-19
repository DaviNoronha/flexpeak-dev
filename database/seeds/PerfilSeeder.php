<?php

use App\Perfil;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::create([
            'nome' => 'admin',
            'descricao' => 'Admin'
        ]);

        Perfil::create([
            'nome' => 'moderador',
            'descricao' => 'Moderador'
        ]);

    }
}
