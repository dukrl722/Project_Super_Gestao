<?php

namespace Database\Seeders;

use App\MotivoContato;
use Illuminate\Database\Seeder;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create(['Dúvida']);
        MotivoContato::create(['Elogio']);
        MotivoContato::create(['Reclamação']);
    }
}
