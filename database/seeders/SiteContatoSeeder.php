<?php

namespace Database\Seeders;

use App\SiteContato;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contato = new SiteContato();

        $contato->nome = '';
        $contato->telefone = '';
        $contato->email = '';
        $contato->motivo_contato = 0;
        $contato->mensagem = '';
        $contato->save();

        SiteContato::factory()->count(100)->create();
    }
}
