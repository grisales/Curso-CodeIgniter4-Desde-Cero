<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run()
    {
        //Inicio de los metodos de eliminacion de registro.
        //Ambos métodos son válidos y ejecutan la misma instrucción.
        /*
        A seguir, el método de construccion del query, seleccion de los datos y eliminación del registro conforme a lo presentado en la video aula 34
        */
        $this->db->table('movies')->where('movie_id >',1)->delete();
      
        /*
        A seguir, el método de construccion del query, seleccion de los datos y eliminación del registro conforme a lo presentado en la documentación.
        https://codeigniter.com/user_guide/database/query_builder.html?highlight=delete#delete
        */

        // $builder = $this->db->table('movies');
        // $builder->where('movie_id',2);
        // $builder->delete();

        
        for ($i=1, $j=1; $i <= 40; $i++,$j++)
        {
            if($j>20){$j=1;}
            $data =
            [
                'category_id' => $j,
                'movie_title' => "Pelicula $i",
                'movie_description' => 'No guns, no killing. Bats frighten me. It\'s time my enemies shared my dread. This isn\'t a car. My anger outweights my guilt. Hero can be anyone. Even a man knowing something as simple and reassuring as putting a coat around a young boy shoulders to let him know the world hadn\'t ended.'
            ];

            $this->db->table('movies')->insert($data);
        }
    }
}
