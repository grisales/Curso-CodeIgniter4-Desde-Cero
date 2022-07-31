<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Movies extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'movie_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'category_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'movie_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'movie_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('movie_id', true);
        $this->forge->createTable('movies');
    }

    public function down()
    {
        $this->forge->dropTable('movies');
    }
}