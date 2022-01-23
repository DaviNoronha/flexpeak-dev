<?php

use App\Bug;
use App\Imagem;
use Illuminate\Database\Seeder;

class ImagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bugs = Bug::all();

        foreach ($bugs as $bug) {
            $imagem = new Imagem();
            $imagem->bug_id = $bug->id;
            $imagem->path = 'bugs/seed/imagem1.jpg';
            $imagem->save();

            $imagem2 = new Imagem();
            $imagem2->bug_id = $bug->id;
            $imagem2->path = 'bugs/seed/imagem2.jpg';
            $imagem2->save();
        }
    }
}
