<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    
    public function run()
    {
       factory(App\Usuarios::class,30)->create();
    }
}
