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

}