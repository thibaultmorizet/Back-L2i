<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class ProductTest extends ApiTestCase
{

    public function testGetCollection(): void
    {

        $client = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        );
        $client->request('GET', '/ws/products');
//        var_dump($client);


//        $this->assertResponseStatusCodeSame(406);
        $this->assertResponseIsSuccessful();


    }
}