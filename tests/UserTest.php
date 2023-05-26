<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserTest extends ApiTestCase
{
    public function testGetCollection(): void
    {

        $response = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        )->request('GET', '/ws/users?itemsPerPage=100');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');

        $this->assertCount(3, $response->toArray());
        $this->assertMatchesResourceCollectionJsonSchema(User::class);
    }

    public function testCreateUser(): void
    {
        $response = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        )->request('POST', '/ws/users', ['json' => [
            "email" => "test@test.com",
            "roles" => ["ROLE_ADMIN"],
            "firstname" => "Thibault",
            "lastname" => "Morizet",
            "language" => "en",
            "password" => password_hash('Thibault14*', PASSWORD_BCRYPT),
            "billingAddress" =>
                [
                    "id" => "1",
                    "street" => "Impasse des coquelicots",
                    "postalcode" => "84000",
                    "city" => "Avignon",
                    "country" => "France"
                ],
            "deliveryAddress" =>
                [
                    "id" => "1",
                    "street" => "Impasse des coquelicots",
                    "postalcode" => "84000",
                    "city" => "Avignon",
                    "country" => "France"
                ],
        ]]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');
        $this->assertMatchesResourceItemJsonSchema(User::class);
    }

    public function testUpdateUser(): void
    {
        $client = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        );
        $iri = $this->findIriBy(User::class, ['email' => "test@test.com"]);

        $client->request('PUT', $iri, ['json' => [
            'email' => 'updatedtest@test.com',
            "roles" => ["ROLE_USER"],
            "firstname" => "Jean",
            "lastname" => "De la fontaine",
            "language" => "fr",
            "password" => password_hash('Thibault14', PASSWORD_BCRYPT),
        ]]);

        $this->assertResponseIsSuccessful();
    }

    public function testDeleteUser(): void
    {
        $client = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        );
        $iri = $this->findIriBy(User::class, ['email' => 'updatedtest@test.com']);

        $client->request('DELETE', $iri);

        $this->assertResponseStatusCodeSame(204);
        $this->assertNull(
        // Through the container, you can access all your services from the tests, including the ORM, the mailer, remote API clients...
            static::getContainer()->get('doctrine')->getRepository(User::class)->findOneBy(['email' => 'updatedtest@test.com'])
        );
    }

}