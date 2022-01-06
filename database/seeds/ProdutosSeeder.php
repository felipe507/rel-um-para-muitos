<?php

use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
            ['nome'=> 'Camisa Lacoste', 'preco'=>14,'estoque'=>4, 'categoria_id'=>1]);
        DB::table('produtos')->insert(
            ['nome'=> 'Camisa Nike', 'preco'=>100,'estoque'=>4, 'categoria_id'=>1]);
        DB::table('produtos')->insert(
            ['nome'=> 'Camisa Adidas', 'preco'=>30,'estoque'=>4, 'categoria_id'=>1]);
        DB::table('produtos')->insert(
            ['nome'=> 'Calça jeans', 'preco'=>140,'estoque'=>4, 'categoria_id'=>1]);
        DB::table('produtos')->insert(
            ['nome'=> 'Torradeira', 'preco'=>40,'estoque'=>4, 'categoria_id'=>2]);
        DB::table('produtos')->insert(
            ['nome'=> 'Mouse', 'preco'=>100,'estoque'=>4, 'categoria_id'=>6]);
        DB::table('produtos')->insert(
            ['nome'=> 'Guarada Roupa', 'preco'=>100,'estoque'=>4, 'categoria_id'=>6]);
    }
}
