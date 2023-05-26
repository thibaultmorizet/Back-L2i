<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Address;

class AddressTest extends ApiTestCase
{

    public function testGetCollection(): void
    {

        $response = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        )->request('GET', '/ws/addresses?itemsPerPage=100');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');

        $this->assertCount(3, $response->toArray());
        $this->assertMatchesResourceCollectionJsonSchema(Address::class);
    }

    public function testCreateAddress(): void
    {
        $response = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        )->request('POST', '/ws/addresses', ['json' => [
            "street" => "Impasse des arbres",
            "postalcode" => "84000",
            "city" => "Avignon",
            "country" => "France",
        ]]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');
        $this->assertMatchesResourceItemJsonSchema(Address::class);
    }

    public function testUpdateAddress(): void
    {
        $client = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        );
        $iri = $this->findIriBy(Address::class, ['street' => "Impasse des arbres"]);

        $client->request('PUT', $iri, ['json' => [
            'street' => 'updated street',
        ]]);

        $this->assertResponseIsSuccessful();
    }

    public function testDeleteAddress(): void
    {
        $client = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        );
        $iri = $this->findIriBy(Address::class, ['street' => 'updated street']);

        $client->request('DELETE', $iri);

        $this->assertResponseStatusCodeSame(204);
        $this->assertNull(
        // Through the container, you can access all your services from the tests, including the ORM, the mailer, remote API clients...
            static::getContainer()->get('doctrine')->getRepository(Address::class)->findOneBy(['street' => 'updated street'])
        );
    }

}