<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Video;

class VideoTest extends ApiTestCase
{

    public function testGetCollection(): void
    {

        $response = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        )->request('GET', '/ws/videos?itemsPerPage=100');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');

        $this->assertCount(15, $response->toArray());
        $this->assertMatchesResourceCollectionJsonSchema(Video::class);
    }

    public function testCreateVideo(): void
    {
        $response = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        )->request('POST', '/ws/videos', ['json' => [
            "title" => "Video Test",
            "summary" => "Formation SEO de l'éditeur Elephorm, présentée par Olivier Andrieu, élu meilleur référenceur naturel de France. Avec cette formation vous allez acquérir toutes les notions fondamentales pour optimiser la présence de votre site Web sur les moteurs de recherche.",
            "year" => "2014",
            "image" => "https://back-l2i.thibaultmorizet.fr/assets/product-images/1.jpeg",
            "unitpriceht" => 65.40,
            "stock" => 500,
            "visitnumber" => 450,
            "soldnumber" => 240,
            "taxe" => ["id" => "1", "tva" => 5.5],
            "brand" => ["id" => "1", "name" => "Elephorm"],
            "author" => [["id" => "1", "lastname" => "Rimelé", "firstname" => "Rodolphe", "language" => "FR"]],
            "category" => [["id" => "1", "name" => "Programmation et langages"]],
        ]]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');
        $this->assertMatchesResourceItemJsonSchema(Video::class);
    }

    public function testUpdateVideo(): void
    {
        $client = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        );
        $iri = $this->findIriBy(Video::class, ['title' => "Video Test"]);

        $client->request('PUT', $iri, ['json' => [
            'title' => 'video updated title',
            "taxe" => ["id" => "2", "tva" => 10],
            "brand" => ["id" => "2", "name" => "Udemy"],
            "author" => [["id" => "2", "lastname" => "Rollet", "firstname" => "Olivier", "language" => "FR"]],
            "category" => [["id" => "2", "name" => "Réseaux et télécommunication"]],

        ]]);

        $this->assertResponseIsSuccessful();
    }

    public function testDeleteVideo(): void
    {
        $client = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        );
        $iri = $this->findIriBy(Video::class, ['title' => 'video updated title']);

        $client->request('DELETE', $iri);

        $this->assertResponseStatusCodeSame(204);
        $this->assertNull(
        // Through the container, you can access all your services from the tests, including the ORM, the mailer, remote API clients...
            static::getContainer()->get('doctrine')->getRepository(Video::class)->findOneBy(['title' => 'video updated title'])
        );
    }

}