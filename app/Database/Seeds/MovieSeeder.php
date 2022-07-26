<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'movie_title' => 'Movie 1',
            'movie_description' => 'No guns, no killing. Bats frighten me. It\'s time my enemies shared my dread. This isn\'t a car. My anger outweights my guilt. Hero can be anyone. Even a man knowing something as simple and reassuring as putting a coat around a young boy shoulders to let him know the world hadn\'t ended.'
        ];

        $this->db->table('movies')->insert($data);
    }

}
