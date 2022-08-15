<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MyHelper extends BaseController
{
    public function array()
    {
        helper('array');

        $data = [
            'uno' => [
                'dos' => [
                    'tres' => 4
                ]
            ]
        ];

        $val = dot_array_search('uno.dos.tres', $data);
        $val = dot_array_search('uno.dos', $data);
        $val = dot_array_search('uno.*', $data);
        var_dump($val);
    }

    public function filesystem()
    {
        helper('filesystem');

        // $map = directory_map('.');
        // $map = directory_map('./bootstrap');
        // $map = directory_map('./bootstrap',1);
        // $map = directory_map('../');
        // $map = directory_map('../',1);
        // $map = directory_map('../app',1);
        // var_dump($map);

        write_file('./bootstrap/customcss.css', 'body{color:red}');
    }

}