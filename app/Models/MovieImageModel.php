<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieImageModel extends Model
{
    protected $table = 'movies_images';
    protected $primaryKey = 'image_id';
    protected $allowedFields = ['movie_id', 'movie_image'];

}