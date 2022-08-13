<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class MyLibraries extends BaseController
{
    public function curl_get()
    {
        $client = \Config\Services::curlrequest();

        $res = $client->get('http://ci4dc.test//rest-movie/44', [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        
        echo $res->getBody();

        // $body = json_decode($res->getBody());
        // var_dump($body->data[0]->movie_id);
    }

    public function curl_remove()
    {
        $client = \Config\Services::curlrequest();

        $res = $client->delete('http://ci4dc.test/rest-movie/44', [
            'headers' => [
                'Accept' => 'application/xml'
            ]
        ]);

        $body = json_decode($res->getBody());

        var_dump($body);
    } //https://codeigniter.com/user_guide/libraries/curlrequest.html?highlight=curlrequest
}
