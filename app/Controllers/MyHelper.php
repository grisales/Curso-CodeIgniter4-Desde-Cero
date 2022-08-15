<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
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

    public function number()
    {
        helper('number');

        // echo number_to_size(456); // Returns 456 Bytes
        // echo number_to_size(1024); // Returns 1 KB
        // echo number_to_size(4567); // Returns 4.5 KB

        // $file = new File(dirname(__DIR__,2).'\public\image_rotate.png');
        // echo $file->getSizeByUnit()."<br>";
        // echo number_to_size($file->getSizeByUnit());

        // echo number_to_size(45678); // Returns 44.6 KB
        // echo number_to_size(456789); // Returns 447.8 KB
        // echo number_to_size(3456789); // Returns 3.3 MB
        // echo number_to_size(1934567891); // Returns 1.8 GB
        // echo number_to_size(12345678912); // Returns 11.5 GB
        // echo number_to_size(123456789123); // Returns 115 GB
        // echo number_to_size(1234567891234); // Returns 1.1 TB
        // echo number_to_size(123456789123456789); // Returns 11,228.3 TB

        // echo number_to_amount(123456789);

        // echo number_to_currency(123456789,'BRL','pt_BR',2);
        // echo number_to_currency(123456789.54,'BRL','pt_BR',2);

        echo number_to_roman(1999);
    }


}