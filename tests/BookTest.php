<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Book;

class BookTest extends ApiTestCase
{

    public function testGetCollection(): void
    {

        $response = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        )->request('GET', '/ws/books?itemsPerPage=100');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');

        $this->assertCount(15, $response->toArray());
        $this->assertMatchesResourceCollectionJsonSchema(Book::class);
    }

    public function testCreateBook(): void
    {
        $response = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        )->request('POST', '/ws/books', ['json' => [
            "title" => "Html 5 - une référence pour le développeur web",
            "summary" => "HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
        Concevoir des sites riches, performants et accessibles avec HTML 5.
        Ce produit fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
        A qui cet ouvrage s'adresse-t-il ?
        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.",
            "year" => "2017",
            "image" => "https://l2i.thibaultmorizet.fr/assets/product-images/16.jpeg",
            "unitpriceht" => 36.97,
            "stock" => 500,
            "visitnumber" => 450,
            "soldnumber" => 240,
            "isbn" => "979-8492283063",
            "taxe" => ["id" => "1", "tva" => 5.5],
            "format" => ["id" => "1", "name" => "Broché"],
            "editor" => ["id" => "1", "name" => "Blanche eyrolles"],
            "author" => [["id" => "1", "lastname" => "Rimelé", "firstname" => "Rodolphe", "language" => "FR"]],
            "category" => [["id" => "1", "name" => "Programmation et langages"]],
        ]]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/json; charset=utf-8');
        $this->assertMatchesResourceItemJsonSchema(Book::class);
    }

    public function testUpdateBook(): void
    {
        $client = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        );
        $iri = $this->findIriBy(Book::class, ['isbn' => "979-8492283063"]);

        $client->request('PUT', $iri, ['json' => [
            'title' => 'updated title',
            "taxe" => ["id" => "2", "tva" => 10],
            "format" => ["id" => "2", "name" => "Poche"],
            "editor" => ["id" => "2", "name" => "Éditions eni"],
            "author" => [["id" => "2", "lastname" => "Rollet", "firstname" => "Olivier", "language" => "FR"]],
            "category" => [["id" => "2", "name" => "Réseaux et télécommunication"]],
        ]]);

        $this->assertResponseIsSuccessful();
    }

    public function testDeleteBook(): void
    {
        $client = static::createClient(
            defaultOptions: [
                'headers' => ['accept' => ['application/json']],
                'base_uri' => 'http://127.0.0.1:8000'
            ]
        );
        $iri = $this->findIriBy(Book::class, ['isbn' => '979-8492283063']);

        $client->request('DELETE', $iri);

        $this->assertResponseStatusCodeSame(204);
        $this->assertNull(
        // Through the container, you can access all your services from the tests, including the ORM, the mailer, remote API clients...
            static::getContainer()->get('doctrine')->getRepository(Book::class)->findOneBy(['isbn' => '979-8492283063'])
        );
    }

}