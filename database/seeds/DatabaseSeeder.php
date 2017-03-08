<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('CategoriasTableSeeder');
        // $this->call(UsersTableSeeder::class);
    }
}

/*class ProdutoTableSeeder extends Seeder {
    
    public function run(){

        DB::table('produtos')->insert([
            ['nome'=> 'pano de prato','quantidade'=>3,'valor'=>10.00, 'categoria' => 1],
            ['nome'=> 'luvas','quantidade'=>4,'valor'=>10.00, 'categoria' => 1],
            ['nome'=> 'touca','quantidade'=>6,'valor'=>15.00, 'categoria' => 1],
        ]);
        
   }*/

   class CategoriasTableSeeder extends Seeder {
    
    public function run(){

        DB::table('categorias')->insert([
            ['categoria'=> 'Bordado'],
            ['categoria'=> 'Tricô'],
            ['categoria'=> 'Crochet'],
        ]);
        
   }
}
