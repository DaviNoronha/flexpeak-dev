<?php

use App\Perfil;
use App\TipoBug;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfilAdmin = Perfil::where('nome', 'admin')->first();
        $perfilMod = Perfil::where('nome', 'moderador')->first();
        $bugVisual = TipoBug::where('nome', 'visual')->first();
        $bugSonoro = TipoBug::where('nome', 'sonoro')->first();
        $bugFisico = TipoBug::where('nome', 'fisico')->first();
        $bugGlitch = TipoBug::where('nome', 'glitch')->first();
        $bugFinanceiro = TipoBug::where('nome', 'financeiro')->first();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'perfil_id' => $perfilAdmin->id,
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Mod Visual',
            'email' => 'visual@email.com',
            'perfil_id' => $perfilMod->id,
            'tipo_bug_id' => $bugVisual->id,
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Mod Sonoro',
            'email' => 'sonoro@email.com',
            'perfil_id' => $perfilMod->id,
            'tipo_bug_id' => $bugSonoro->id,
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Mod Físico',
            'email' => 'fisico@email.com',
            'perfil_id' => $perfilMod->id,
            'tipo_bug_id' => $bugFisico->id,
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Mod Glitch',
            'email' => 'glitch@email.com',
            'perfil_id' => $perfilMod->id,
            'tipo_bug_id' => $bugGlitch->id,
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Mod Financeiro',
            'email' => 'financeiro@email.com',
            'perfil_id' => $perfilMod->id,
            'tipo_bug_id' => $bugFinanceiro->id,
            'password' => bcrypt('12345678')
        ]);
    }
}
