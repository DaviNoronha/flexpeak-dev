<?php

use App\TipoBug;
use Illuminate\Database\Seeder;

class TipoBugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoBug::create([
            'nome' => 'visual',
            'descricao' => 'Visual'
        ]);
        TipoBug::create([
            'nome' => 'sonoro',
            'descricao' => 'Sonoro'
        ]);
        TipoBug::create([
            'nome' => 'fisico',
            'descricao' => 'Físico'
        ]);
        TipoBug::create([
            'nome' => 'glitch',
            'descricao' => 'Glitch'
        ]);
        TipoBug::create([
            'nome' => 'financeiro',
            'descricao' => 'Financeiro'
        ]);
    }
}
