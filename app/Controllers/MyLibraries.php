<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class MyLibraries extends BaseController
{
    public function curl_get()
    {
        $client = \Config\Services::curlrequest();

        $res = $client->get('http://ci4dc.test/rest-movie/44', [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        
        echo $res->getBody();

        // $body = json_decode($res->getBody());
        // var_dump($body->data[0]->movie_id);
    }

    public function curl_post()
    {
        $client = \Config\Services::curlrequest();

        $res = $client->post('http://ci4dc.test/rest-movie', [
            'form_params' => [
                'category_id' => 1,
                // 'title' => 'Título nueva peli',
                // 'description' => 'lorem imput'
            ]
        ]);

        //$body = json_decode($res->getBody());
        echo $res->getBody();
    }

    public function curl_put()
    {
        $client = \Config\Services::curlrequest();

        $res = $client->put('http://ci4dc.test/rest-movie/46', [
            'form_params' => [
                'category_id' => 1,
                'title' => 'El nuevo en la 46',
                'description' => 'lorem imputadisimo.'
            ]
        ]);

        //$body = json_decode($res->getBody());
        echo $res->getBody();
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


    // agentes
    public function agent()
    {
        $config = new \Config\Web();
        $data = $this->request->getUserAgent();
        
        $dataHeader = [
            'title' => "Agent",
            'site' => $config->siteName
        ];

        echo view("dashboard/templates/header", $dataHeader);
        echo view("librarie/my_agent", ['agent' => $data]);
        echo view("dashboard/templates/footer");
    }

    
}