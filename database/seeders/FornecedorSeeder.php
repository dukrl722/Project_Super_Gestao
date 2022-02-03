<?php

namespace Database\Seeders;

use App\Fornecedor;
use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();

        $fornecedor->nome = '';
        $fornecedor->site = '';
        $fornecedor->uf = '';
        $fornecedor->email = '';
        $fornecedor->save();
    }
}
