<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BooksFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [
            VideosFixtures::class,
            AuthorsFixtures::class,
            FormatsFixtures::class,
            EditorsFixtures::class,
            CategoriesFixtures::class,
            TaxesFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $book1 = new Book();
        $book1->setTitle("Html 5 - une référence pour le développeur web");
        $book1->setSummary("
        HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
        Concevoir des sites riches, performants et accessibles avec HTML 5.
        Ce produit fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
        A qui cet ouvrage s'adresse-t-il ?
        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.
        ");
        $book1->setYear(2017);
        $book1->setImage("https://www.thibaultmorizet.fr/assets/product-images/2.jpeg");
        $book1->setUnitpriceht(36.86);
        $book1->setStock($faker->numberBetween(min: 50, max: 600));
        $book1->setTaxe($this->getReference('taxe1'));
        $book1->setVisitnumber($faker->numberBetween(max: 500));
        $book1->setSoldnumber($faker->numberBetween(max: $book1->getVisitnumber()));
        $book1->setIsbn("978-2-212-14365-2");
        $book1->setFormat($this->getReference('format1'));
        $book1->setEditor($this->getReference('editor1'));
        $book1->addAuthor($this->getReference('author1'));
        $book1->addCategory($this->getReference('category1'));
        $manager->persist($book1);
        $this->addReference('book1', $book1);

        $book2 = new Book();
        $book2->setTitle("Apprendre à développer un site web avec PHP et MySQL");
        $book2->setSummary("
        Ce livre s'adresse à un public de développeurs débutants connaissant déjà le HTML et les CSS et qui souhaitent bien comprendre le fonctionnement d'une application web pour créer leurs propres sites web dynamiques avec PHP et MySQL. 

        Dans une première partie, le lecteur installera son environnement de développement WAMP puis découvrira les bases du langage PHP (en version 7 au moment de l'écriture), ses principales fonctions et structures de contrôle, ainsi que des explications sur la transmission des données entre les pages et sur la librairie graphique (les effets spéciaux sur une image). Ces apports théoriques sont accompagnés de nombreux exemples.

        Il en est de même dans la deuxième partie du livre, consacrée au langage SQL. Le lecteur découvrira ce qu'est une base de données MySQL et les différentes méthodes pour y accéder avec PHP (PDO, SQL Avancé) et comment assurer la sécurité de la base. Un chapitre est également consacré aux premiers pas sur la Programmation Orientée Objet et un autre à la gestion de la configuration et des performances.

        Pour que le lecteur puisse se forger une première expérience significative, l'auteur a préparé de nombreux exercices à la fin de chaque chapitre (exemples : comme créer un blog, une newsletter, un module de paiement en ligne PayPal...) et propose aussi leurs corrigés.
        ");
        $book2->setYear(2018);
        $book2->setImage("https://www.thibaultmorizet.fr/assets/product-images/3.jpeg");
        $book2->setUnitpriceht(28.25);
        $book2->setStock($faker->numberBetween(min: 50, max: 600));
        $book2->setTaxe($this->getReference('taxe1'));
        $book2->setVisitnumber($faker->numberBetween(max: 500));
        $book2->setSoldnumber($faker->numberBetween(max: $book2->getVisitnumber()));
        $book2->setIsbn("978-2-409-01469-7");
        $book2->setFormat($this->getReference('format1'));
        $book2->setEditor($this->getReference('editor2'));
        $book2->addAuthor($this->getReference('author2'));
        $book2->addCategory($this->getReference('category1'));
        $manager->persist($book2);
        $this->addReference('book2', $book2);

        $book3 = new Book();
        $book3->setTitle("Coder proprement");
        $book3->setSummary("
        Si un code sale peut fonctionner, il peut également compromettre la pérennité d'une entreprise de développement de logiciels. Chaque année, du temps et des ressources sont gaspillés à cause d'un code mal écrit. Toutefois, ce n'est pas une fatalité.

        Grâce à cet ouvrage, vous apprendrez à rédiger du bon code, ainsi qu'à le nettoyer « à la volée », et vous obtiendrez des applications plus robustes, plus évolutives et donc plus durables. Concret et pédagogique, ce manuel se base sur les bonnes pratiques d'une équipe de développeurs aguerris réunie autour de Robert C. Martin, expert logiciel reconnu. Il vous inculquera les valeurs d'un artisan du logiciel et fera de vous un meilleur programmeur.

        Coder proprement est décomposé en trois parties. La première décrit les principes, les motifs et les pratiques employés dans l'écriture d'un code propre. La deuxième est constituée de plusieurs études de cas à la complexité croissante. Chacune d'elles est un exercice de nettoyage: vous partirez d'un exemple de code présentant certains problèmes, et l'auteur vous expliquera comment en obtenir une version saine et performante. La troisième partie, enfin, sera votre récompense. Son unique chapitre contient une liste d'indicateurs éprouvés par l'auteur qui vous seront précieux pour repérer efficacement les défauts de votre code.

        Après avoir lu ce livre, vous saurez :
        -faire la différence entre du bon et du mauvais code ;
        -écrire du bon code et transformer le mauvais code en bon code ;
        -choisir des noms, des fonctions, des objets et des classes appropriés ;
        -mettre en forme le code pour une lisibilité maximale ;
        -implémenter le traitement des erreurs sans perturber la logique du code ;
        -mener des tests unitaires et pratiquer le développement piloté par les tests.

        Véritable manuel du savoir-faire en développement agile, cet ouvrage est un outil indispensable à tout développeur, ingénieur logiciel, chef de projet, responsable d'équipe ou analyste des systèmes dont l'objectif est de produire un meilleur code.        ");
        $book3->setYear(2019);
        $book3->setImage("https://www.thibaultmorizet.fr/assets/product-images/4.jpeg");
        $book3->setUnitpriceht(35.91);
        $book3->setStock($faker->numberBetween(min: 50, max: 600));
        $book3->setTaxe($this->getReference('taxe1'));
        $book3->setVisitnumber($faker->numberBetween(max: 500));
        $book3->setSoldnumber($faker->numberBetween(max: $book3->getVisitnumber()));
        $book3->setIsbn("978-2326002272");
        $book3->setFormat($this->getReference('format1'));
        $book3->setEditor($this->getReference('editor3'));
        $book3->addAuthor($this->getReference('author2'));
        $book3->addCategory($this->getReference('category1'));
        $manager->persist($book3);
        $this->addReference('book3', $book3);


//
//        $produits[3] = new Product();
//        $produits[3]->setTitle("PHP et MySQL pour les Nuls");
//        $produits[3]->setSummary("
//        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.
//        Ce produit vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...
//                    ");
//        $produits[3]->setYear(2019);
//        $produits[3]->setImage("https://www.thibaultmorizet.fr/assets/76.jpeg");
//        $produits[3]->setUnitpricettc(12.5);
//        $produits[3]->setUnitpriceht(52.99);
//        $produits[3]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[3]->setIsbn("9782412043622");
//        $produits[3]->setFormat($formats[1]);
//        $produits[3]->setEditor($editors[3]);
//        $produits[3]->addAuthor($auteurs[3]);
//        $produits[3]->addCategory($categories[2]);
//        $produits[3]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[3]);
//
//        $produits[4] = new Product();
//        $produits[4]->setTitle("Les bases du web : Html5, Css3, JavaScript");
//        $produits[4]->setSummary("
//        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce produit est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce produit. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce produit est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l'a inventé et pourquoi. Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing.
//        ");
//        $produits[4]->setYear(2019);
//        $produits[4]->setImage("https://www.thibaultmorizet.fr/assets/77.jpeg");
//        $produits[4]->setUnitpricettc(19.9);
//        $produits[4]->setUnitpriceht(52.99);
//        $produits[4]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[4]->setIsbn("9781706785606");
//        $produits[4]->setFormat($formats[0]);
//        $produits[4]->setEditor($editors[4]);
//        $produits[4]->addAuthor($auteurs[4]);
//        $produits[4]->addCategory($categories[0]);
//        $produits[4]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[4]);
//
//        $produits[5] = new Product();
//        $produits[5]->setTitle("HTML5 & CSS3 - Créer un site web responsive");
//        $produits[5]->setSummary("
//        Dans ce produit vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5. Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.        ");
//        $produits[5]->setYear(2020);
//        $produits[5]->setImage("https://www.thibaultmorizet.fr/assets/78.jpeg");
//        $produits[5]->setUnitpricettc(19.99);
//        $produits[5]->setUnitpriceht(52.99);
//        $produits[5]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[5]->setIsbn("9788698662860");
//        $produits[5]->setFormat($formats[0]);
//        $produits[5]->setEditor($editors[4]);
//        $produits[5]->addAuthor($auteurs[4]);
//        $produits[5]->addCategory($categories[0]);
//        $produits[5]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[5]);
//
//
//        $produits[6] = new Product();
//        $produits[6]->setTitle("Réseaux informatiques - Notions fondamentales (9e édition)");
//        $produits[6]->setSummary("
//        Ingénieur en Informatique, passionné par la technologie et le partage de la connaissance, José DORDOIGNE est un expert technique dans de nombreux domaines (poste de travail et serveurs Windows, réseau et services réseau, Unix, Linux…) qui exerce aujourd'hui au sein d'une grande compagnie d'assurance française. Il est titulaire de très nombreuses certifications (plusieurs fois Microsoft Certified Systems Engineer, mais aussi Red Hat Certified Engineer Linux). Sa pédagogie et son expertise technique ont notamment été éprouvées au travers d'une expérience de près de 10 ans en tant qu'Ingénieur formateur, de démarches de conseils au sein d'une grande SSII pendant 12 années en tant qu'architecte Infrastructure, ainsi qu'avec l'écriture d'une dizaine de produits sur les systèmes d'exploitation Microsoft et les réseaux TCP/IP.
//        ");
//        $produits[6]->setYear(2022);
//        $produits[6]->setImage("https://www.thibaultmorizet.fr/assets/79.jpeg");
//        $produits[6]->setUnitpricettc(29.90);
//        $produits[6]->setUnitpriceht(52.99);
//        $produits[6]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[6]->setIsbn("9782409035173");
//        $produits[6]->setFormat($formats[0]);
//        $produits[6]->setEditor($editors[1]);
//        $produits[6]->addAuthor($auteurs[5]);
//        $produits[6]->addCategory($categories[1]);
//        $produits[6]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[6]);
//
//
//        $produits[7] = new Product();
//        $produits[7]->setTitle("Html 5 - une référence pour le développeur web");
//        $produits[7]->setSummary("HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
//        Concevoir des sites riches, performants et accessibles avec HTML 5.
//        Ce produit fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
//        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
//        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
//        A qui cet ouvrage s'adresse-t-il ?
//        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
//        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
//        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.");
//        $produits[7]->setYear(2017);
//        $produits[7]->setImage("https://www.thibaultmorizet.fr/assets/80.jpeg");
//        $produits[7]->setUnitpricettc(39.00);
//        $produits[7]->setUnitpriceht(52.99);
//        $produits[7]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[7]->setIsbn("2212143656");
//        $produits[7]->setFormat($formats[0]);
//        $produits[7]->setEditor($editors[0]);
//        $produits[7]->addAuthor($auteurs[0]);
//        $produits[7]->addCategory($categories[0]);
//        $produits[7]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[7]);
//
//        $produits[8] = new Product();
//        $produits[8]->setTitle("Apprendre à développer un site web avec PHP et MySQL");
//        $produits[8]->setSummary("Ce produit s'adresse à un public de développeurs débutants connaissant déjà le HTML et les CSS et qui souhaitent bien comprendre le fonctionnement d'une application web pour créer leurs propres sites web dynamiques avec PHP et MySQL.
//            Dans une première partie, le lecteur installera son environnement de développement WAMP puis découvrira les bases du langage PHP (en version 7 au moment de l'écriture), ses principales fonctions et structures de contrôle, ainsi que des explications sur la transmission des données entre les pages et sur la librairie graphique (les effets spéciaux sur une image). Ces apports théoriques sont accompagnés de nombreux exemples.
//            Il en est de même dans la deuxième partie du produit, consacrée au langage SQL. Le lecteur découvrira ce qu'est une base de données MySQL et les différentes méthodes pour y accéder avec PHP (PDO, SQL Avancé) et comment assurer la sécurité de la base. Un chapitre est également consacré aux premiers pas sur la Programmation Orientée Objet et un autre à la gestion de la configuration et des performances.
//            Pour que le lecteur puisse se forger une première expérience significative, l'auteur a préparé de nombreux exercices à la fin de chaque chapitre (exemples : comme créer un blog, une newsletter, un module de paiement en ligne PayPal...) et propose aussi leurs corrigés.
//            ");
//        $produits[8]->setYear(2018);
//        $produits[8]->setImage("https://www.thibaultmorizet.fr/assets/81.jpeg");
//        $produits[8]->setUnitpricettc(29.90);
//        $produits[8]->setUnitpriceht(52.99);
//        $produits[8]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[8]->setIsbn("9782409015297");
//        $produits[8]->setFormat($formats[0]);
//        $produits[8]->setEditor($editors[1]);
//        $produits[8]->addAuthor($auteurs[1]);
//        $produits[8]->addCategory($categories[0]);
//        $produits[8]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[8]);
//
//        $produits[9] = new Product();
//        $produits[9]->setTitle("CODER PROPREMENT");
//        $produits[9]->setSummary("
//        Si un code sale peut fonctionner, il peut également compromettre la pérennité d'une entreprise de développement de logiciels. Chaque année, du temps et des ressources sont gaspillés à cause d'un code mal écrit. Toutefois, ce n'est pas une fatalité.
//Grâce à cet ouvrage, vous apprendrez à rédiger du bon code, ainsi qu'à le nettoyer « à la volée », et vous obtiendrez des applications plus robustes, plus évolutives et donc plus durables. Concret et pédagogique, ce manuel se base sur les bonnes pratiques d'une équipe de développeurs aguerris réunie autour de Robert C. Martin, expert logiciel reconnu. Il vous inculquera les valeurs d'un artisan du logiciel et fera de vous un meilleur programmeur.
//Coder proprement est décomposé en trois parties. La première décrit les principes, les motifs et les pratiques employés dans l'écriture d'un code propre. La deuxième est constituée de plusieurs études de cas à la complexité croissante. Chacune d'elles est un exercice de nettoyage: vous partirez d'un exemple de code présentant certains problèmes, et l'auteur vous expliquera comment en obtenir une version saine et performante. La troisième partie, enfin, sera votre récompense. Son unique chapitre contient une liste d'indicateurs éprouvés par l'auteur qui vous seront précieux pour repérer efficacement les défauts de votre code.
//            ");
//        $produits[9]->setYear(2019);
//        $produits[9]->setImage("https://www.thibaultmorizet.fr/assets/82.jpeg");
//        $produits[9]->setUnitpricettc(38);
//        $produits[9]->setUnitpriceht(52.99);
//        $produits[9]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[9]->setIsbn("9782326002272");
//        $produits[9]->setFormat($formats[0]);
//        $produits[9]->setEditor($editors[2]);
//        $produits[9]->addAuthor($auteurs[2]);
//        $produits[9]->addCategory($categories[0]);
//        $produits[9]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[9]);
//
//
//        $produits[10] = new Product();
//        $produits[10]->setTitle("PHP et MySQL pour les Nuls");
//        $produits[10]->setSummary("
//        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.
//        Ce produit vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...
//                    ");
//        $produits[10]->setYear(2019);
//        $produits[10]->setImage("https://www.thibaultmorizet.fr/assets/83.jpeg");
//        $produits[10]->setUnitpricettc(12.5);
//        $produits[10]->setUnitpriceht(52.99);
//        $produits[10]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[10]->setIsbn("9782412043622");
//        $produits[10]->setFormat($formats[1]);
//        $produits[10]->setEditor($editors[3]);
//        $produits[10]->addAuthor($auteurs[3]);
//        $produits[10]->addCategory($categories[2]);
//        $produits[10]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[10]);
//
//        $produits[11] = new Product();
//        $produits[11]->setTitle("Les bases du web : Html5, Css3, JavaScript");
//        $produits[11]->setSummary("
//        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce produit est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce produit. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce produit est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l'a inventé et pourquoi. Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing.
//        ");
//        $produits[11]->setYear(2019);
//        $produits[11]->setImage("https://www.thibaultmorizet.fr/assets/84.jpeg");
//        $produits[11]->setUnitpricettc(19.9);
//        $produits[11]->setUnitpriceht(52.99);
//        $produits[11]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[11]->setIsbn("9781706785606");
//        $produits[11]->setFormat($formats[0]);
//        $produits[11]->setEditor($editors[4]);
//        $produits[11]->addAuthor($auteurs[4]);
//        $produits[11]->addCategory($categories[0]);
//        $produits[11]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[11]);
//
//        $produits[12] = new Product();
//        $produits[12]->setTitle("HTML5 & CSS3 - Créer un site web responsive");
//        $produits[12]->setSummary("
//        Dans ce produit vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5. Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.        ");
//        $produits[12]->setYear(2020);
//        $produits[12]->setImage("https://www.thibaultmorizet.fr/assets/85.jpeg");
//        $produits[12]->setUnitpricettc(19.99);
//        $produits[12]->setUnitpriceht(52.99);
//        $produits[12]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[12]->setIsbn("9788698662860");
//        $produits[12]->setFormat($formats[0]);
//        $produits[12]->setEditor($editors[4]);
//        $produits[12]->addAuthor($auteurs[4]);
//        $produits[12]->addCategory($categories[0]);
//        $produits[12]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[12]);
//
//
//        $produits[13] = new Product();
//        $produits[13]->setTitle("Réseaux informatiques - Notions fondamentales (9e édition)");
//        $produits[13]->setSummary("
//        Ingénieur en Informatique, passionné par la technologie et le partage de la connaissance, José DORDOIGNE est un expert technique dans de nombreux domaines (poste de travail et serveurs Windows, réseau et services réseau, Unix, Linux…) qui exerce aujourd'hui au sein d'une grande compagnie d'assurance française. Il est titulaire de très nombreuses certifications (plusieurs fois Microsoft Certified Systems Engineer, mais aussi Red Hat Certified Engineer Linux). Sa pédagogie et son expertise technique ont notamment été éprouvées au travers d'une expérience de près de 10 ans en tant qu'Ingénieur formateur, de démarches de conseils au sein d'une grande SSII pendant 12 années en tant qu'architecte Infrastructure, ainsi qu'avec l'écriture d'une dizaine de produits sur les systèmes d'exploitation Microsoft et les réseaux TCP/IP.
//        ");
//        $produits[13]->setYear(2022);
//        $produits[13]->setImage("https://www.thibaultmorizet.fr/assets/86.jpeg");
//        $produits[13]->setUnitpricettc(29.90);
//        $produits[13]->setUnitpriceht(52.99);
//        $produits[13]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[13]->setIsbn("9782409035173");
//        $produits[13]->setFormat($formats[0]);
//        $produits[13]->setEditor($editors[1]);
//        $produits[13]->addAuthor($auteurs[5]);
//        $produits[13]->addCategory($categories[1]);
//        $produits[13]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[13]);
//
//
//        $produits[14] = new Product();
//        $produits[14]->setTitle("Html 5 - une référence pour le développeur web");
//        $produits[14]->setSummary("HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
//        Concevoir des sites riches, performants et accessibles avec HTML 5.
//        Ce produit fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
//        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
//        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
//        A qui cet ouvrage s'adresse-t-il ?
//        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
//        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
//        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.");
//        $produits[14]->setYear(2017);
//        $produits[14]->setImage("https://www.thibaultmorizet.fr/assets/87.jpeg");
//        $produits[14]->setUnitpricettc(39.00);
//        $produits[14]->setUnitpriceht(52.99);
//        $produits[14]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[14]->setIsbn("2212143656");
//        $produits[14]->setFormat($formats[0]);
//        $produits[14]->setEditor($editors[0]);
//        $produits[14]->addAuthor($auteurs[0]);
//        $produits[14]->addCategory($categories[0]);
//        $produits[14]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[14]);
//
//        $produits[15] = new Product();
//        $produits[15]->setTitle("Apprendre à développer un site web avec PHP et MySQL");
//        $produits[15]->setSummary("Ce produit s'adresse à un public de développeurs débutants connaissant déjà le HTML et les CSS et qui souhaitent bien comprendre le fonctionnement d'une application web pour créer leurs propres sites web dynamiques avec PHP et MySQL.
//            Dans une première partie, le lecteur installera son environnement de développement WAMP puis découvrira les bases du langage PHP (en version 7 au moment de l'écriture), ses principales fonctions et structures de contrôle, ainsi que des explications sur la transmission des données entre les pages et sur la librairie graphique (les effets spéciaux sur une image). Ces apports théoriques sont accompagnés de nombreux exemples.
//            Il en est de même dans la deuxième partie du produit, consacrée au langage SQL. Le lecteur découvrira ce qu'est une base de données MySQL et les différentes méthodes pour y accéder avec PHP (PDO, SQL Avancé) et comment assurer la sécurité de la base. Un chapitre est également consacré aux premiers pas sur la Programmation Orientée Objet et un autre à la gestion de la configuration et des performances.
//            Pour que le lecteur puisse se forger une première expérience significative, l'auteur a préparé de nombreux exercices à la fin de chaque chapitre (exemples : comme créer un blog, une newsletter, un module de paiement en ligne PayPal...) et propose aussi leurs corrigés.
//            ");
//        $produits[15]->setYear(2018);
//        $produits[15]->setImage("https://www.thibaultmorizet.fr/assets/88.jpeg");
//        $produits[15]->setUnitpricettc(29.90);
//        $produits[15]->setUnitpriceht(52.99);
//        $produits[15]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[15]->setIsbn("9782409015297");
//        $produits[15]->setFormat($formats[0]);
//        $produits[15]->setEditor($editors[1]);
//        $produits[15]->addAuthor($auteurs[1]);
//        $produits[15]->addCategory($categories[0]);
//        $produits[15]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[15]);
//
//        $produits[16] = new Product();
//        $produits[16]->setTitle("CODER PROPREMENT");
//        $produits[16]->setSummary("
//        Si un code sale peut fonctionner, il peut également compromettre la pérennité d'une entreprise de développement de logiciels. Chaque année, du temps et des ressources sont gaspillés à cause d'un code mal écrit. Toutefois, ce n'est pas une fatalité.
//Grâce à cet ouvrage, vous apprendrez à rédiger du bon code, ainsi qu'à le nettoyer « à la volée », et vous obtiendrez des applications plus robustes, plus évolutives et donc plus durables. Concret et pédagogique, ce manuel se base sur les bonnes pratiques d'une équipe de développeurs aguerris réunie autour de Robert C. Martin, expert logiciel reconnu. Il vous inculquera les valeurs d'un artisan du logiciel et fera de vous un meilleur programmeur.
//Coder proprement est décomposé en trois parties. La première décrit les principes, les motifs et les pratiques employés dans l'écriture d'un code propre. La deuxième est constituée de plusieurs études de cas à la complexité croissante. Chacune d'elles est un exercice de nettoyage: vous partirez d'un exemple de code présentant certains problèmes, et l'auteur vous expliquera comment en obtenir une version saine et performante. La troisième partie, enfin, sera votre récompense. Son unique chapitre contient une liste d'indicateurs éprouvés par l'auteur qui vous seront précieux pour repérer efficacement les défauts de votre code.
//            ");
//        $produits[16]->setYear(2019);
//        $produits[16]->setImage("https://www.thibaultmorizet.fr/assets/89.jpeg");
//        $produits[16]->setUnitpricettc(38);
//        $produits[16]->setUnitpriceht(52.99);
//        $produits[16]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[16]->setIsbn("9782326002272");
//        $produits[16]->setFormat($formats[0]);
//        $produits[16]->setEditor($editors[2]);
//        $produits[16]->addAuthor($auteurs[2]);
//        $produits[16]->addCategory($categories[0]);
//        $produits[16]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[16]);
//
//
//        $produits[17] = new Product();
//        $produits[17]->setTitle("PHP et MySQL pour les Nuls");
//        $produits[17]->setSummary("
//        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.
//        Ce produit vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...
//                    ");
//        $produits[17]->setYear(2019);
//        $produits[17]->setImage("https://www.thibaultmorizet.fr/assets/90.jpeg");
//        $produits[17]->setUnitpricettc(12.5);
//        $produits[17]->setUnitpriceht(52.99);
//        $produits[17]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[17]->setIsbn("9782412043622");
//        $produits[17]->setFormat($formats[1]);
//        $produits[17]->setEditor($editors[3]);
//        $produits[17]->addAuthor($auteurs[3]);
//        $produits[17]->addCategory($categories[2]);
//        $produits[17]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[17]);
//
//        $produits[18] = new Product();
//        $produits[18]->setTitle("Les bases du web : Html5, Css3, JavaScript");
//        $produits[18]->setSummary("
//        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce produit est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce produit. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce produit est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l'a inventé et pourquoi. Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing.
//        ");
//        $produits[18]->setYear(2019);
//        $produits[18]->setImage("https://www.thibaultmorizet.fr/assets/91.jpeg");
//        $produits[18]->setUnitpricettc(19.9);
//        $produits[18]->setUnitpriceht(52.99);
//        $produits[18]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[18]->setIsbn("9781706785606");
//        $produits[18]->setFormat($formats[0]);
//        $produits[18]->setEditor($editors[4]);
//        $produits[18]->addAuthor($auteurs[4]);
//        $produits[18]->addCategory($categories[0]);
//        $produits[18]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[18]);
//
//        $produits[19] = new Product();
//        $produits[19]->setTitle("HTML5 & CSS3 - Créer un site web responsive");
//        $produits[19]->setSummary("
//        Dans ce produit vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5. Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.        ");
//        $produits[19]->setYear(2020);
//        $produits[19]->setImage("https://www.thibaultmorizet.fr/assets/92.jpeg");
//        $produits[19]->setUnitpricettc(19.99);
//        $produits[19]->setUnitpriceht(52.99);
//        $produits[19]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[19]->setIsbn("9788698662860");
//        $produits[19]->setFormat($formats[0]);
//        $produits[19]->setEditor($editors[4]);
//        $produits[19]->addAuthor($auteurs[4]);
//        $produits[19]->addCategory($categories[0]);
//        $produits[19]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[19]);
//
//
//        $produits[20] = new Product();
//        $produits[20]->setTitle("Réseaux informatiques - Notions fondamentales (9e édition)");
//        $produits[20]->setSummary("
//        Ingénieur en Informatique, passionné par la technologie et le partage de la connaissance, José DORDOIGNE est un expert technique dans de nombreux domaines (poste de travail et serveurs Windows, réseau et services réseau, Unix, Linux…) qui exerce aujourd'hui au sein d'une grande compagnie d'assurance française. Il est titulaire de très nombreuses certifications (plusieurs fois Microsoft Certified Systems Engineer, mais aussi Red Hat Certified Engineer Linux). Sa pédagogie et son expertise technique ont notamment été éprouvées au travers d'une expérience de près de 10 ans en tant qu'Ingénieur formateur, de démarches de conseils au sein d'une grande SSII pendant 12 années en tant qu'architecte Infrastructure, ainsi qu'avec l'écriture d'une dizaine de produits sur les systèmes d'exploitation Microsoft et les réseaux TCP/IP.
//        ");
//        $produits[20]->setYear(2022);
//        $produits[20]->setImage("https://www.thibaultmorizet.fr/assets/93.jpeg");
//        $produits[20]->setUnitpricettc(29.90);
//        $produits[20]->setUnitpriceht(52.99);
//        $produits[20]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[20]->setIsbn("9782409035173");
//        $produits[20]->setFormat($formats[0]);
//        $produits[20]->setEditor($editors[1]);
//        $produits[20]->addAuthor($auteurs[5]);
//        $produits[20]->addCategory($categories[1]);
//        $produits[20]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[20]);
//
//
//        $produits[21] = new Product();
//        $produits[21]->setTitle("Html 5 - une référence pour le développeur web");
//        $produits[21]->setSummary("HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
//        Concevoir des sites riches, performants et accessibles avec HTML 5.
//        Ce produit fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
//        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
//        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
//        A qui cet ouvrage s'adresse-t-il ?
//        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
//        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
//        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.");
//        $produits[21]->setYear(2017);
//        $produits[21]->setImage("https://www.thibaultmorizet.fr/assets/94.jpeg");
//        $produits[21]->setUnitpricettc(39.00);
//        $produits[21]->setUnitpriceht(52.99);
//        $produits[21]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[21]->setIsbn("2212143656");
//        $produits[21]->setFormat($formats[0]);
//        $produits[21]->setEditor($editors[0]);
//        $produits[21]->addAuthor($auteurs[0]);
//        $produits[21]->addCategory($categories[0]);
//        $produits[21]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[21]);
//
//        $produits[22] = new Product();
//        $produits[22]->setTitle("Apprendre à développer un site web avec PHP et MySQL");
//        $produits[22]->setSummary("Ce produit s'adresse à un public de développeurs débutants connaissant déjà le HTML et les CSS et qui souhaitent bien comprendre le fonctionnement d'une application web pour créer leurs propres sites web dynamiques avec PHP et MySQL.
//            Dans une première partie, le lecteur installera son environnement de développement WAMP puis découvrira les bases du langage PHP (en version 7 au moment de l'écriture), ses principales fonctions et structures de contrôle, ainsi que des explications sur la transmission des données entre les pages et sur la librairie graphique (les effets spéciaux sur une image). Ces apports théoriques sont accompagnés de nombreux exemples.
//            Il en est de même dans la deuxième partie du produit, consacrée au langage SQL. Le lecteur découvrira ce qu'est une base de données MySQL et les différentes méthodes pour y accéder avec PHP (PDO, SQL Avancé) et comment assurer la sécurité de la base. Un chapitre est également consacré aux premiers pas sur la Programmation Orientée Objet et un autre à la gestion de la configuration et des performances.
//            Pour que le lecteur puisse se forger une première expérience significative, l'auteur a préparé de nombreux exercices à la fin de chaque chapitre (exemples : comme créer un blog, une newsletter, un module de paiement en ligne PayPal...) et propose aussi leurs corrigés.
//            ");
//        $produits[22]->setYear(2018);
//        $produits[22]->setImage("https://www.thibaultmorizet.fr/assets/95.jpeg");
//        $produits[22]->setUnitpricettc(29.90);
//        $produits[22]->setUnitpriceht(52.99);
//        $produits[22]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[22]->setIsbn("9782409015297");
//        $produits[22]->setFormat($formats[0]);
//        $produits[22]->setEditor($editors[1]);
//        $produits[22]->addAuthor($auteurs[1]);
//        $produits[22]->addCategory($categories[0]);
//        $produits[22]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[22]);
//
//        $produits[23] = new Product();
//        $produits[23]->setTitle("CODER PROPREMENT");
//        $produits[23]->setSummary("
//        Si un code sale peut fonctionner, il peut également compromettre la pérennité d'une entreprise de développement de logiciels. Chaque année, du temps et des ressources sont gaspillés à cause d'un code mal écrit. Toutefois, ce n'est pas une fatalité.
//Grâce à cet ouvrage, vous apprendrez à rédiger du bon code, ainsi qu'à le nettoyer « à la volée », et vous obtiendrez des applications plus robustes, plus évolutives et donc plus durables. Concret et pédagogique, ce manuel se base sur les bonnes pratiques d'une équipe de développeurs aguerris réunie autour de Robert C. Martin, expert logiciel reconnu. Il vous inculquera les valeurs d'un artisan du logiciel et fera de vous un meilleur programmeur.
//Coder proprement est décomposé en trois parties. La première décrit les principes, les motifs et les pratiques employés dans l'écriture d'un code propre. La deuxième est constituée de plusieurs études de cas à la complexité croissante. Chacune d'elles est un exercice de nettoyage: vous partirez d'un exemple de code présentant certains problèmes, et l'auteur vous expliquera comment en obtenir une version saine et performante. La troisième partie, enfin, sera votre récompense. Son unique chapitre contient une liste d'indicateurs éprouvés par l'auteur qui vous seront précieux pour repérer efficacement les défauts de votre code.
//            ");
//        $produits[23]->setYear(2019);
//        $produits[23]->setImage("https://www.thibaultmorizet.fr/assets/96.jpeg");
//        $produits[23]->setUnitpricettc(38);
//        $produits[23]->setUnitpriceht(52.99);
//        $produits[23]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[23]->setIsbn("9782326002272");
//        $produits[23]->setFormat($formats[0]);
//        $produits[23]->setEditor($editors[2]);
//        $produits[23]->addAuthor($auteurs[2]);
//        $produits[23]->addCategory($categories[0]);
//        $produits[23]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[23]);
//
//
//        $produits[24] = new Product();
//        $produits[24]->setTitle("PHP et MySQL pour les Nuls");
//        $produits[24]->setSummary("
//        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.
//        Ce produit vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...
//                    ");
//        $produits[24]->setYear(2019);
//        $produits[24]->setImage("https://www.thibaultmorizet.fr/assets/97.jpeg");
//        $produits[24]->setUnitpricettc(12.5);
//        $produits[24]->setUnitpriceht(52.99);
//        $produits[24]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[24]->setIsbn("9782412043622");
//        $produits[24]->setFormat($formats[1]);
//        $produits[24]->setEditor($editors[3]);
//        $produits[24]->addAuthor($auteurs[3]);
//        $produits[24]->addCategory($categories[2]);
//        $produits[24]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[24]);
//
//        $produits[25] = new Product();
//        $produits[25]->setTitle("Les bases du web : Html5, Css3, JavaScript");
//        $produits[25]->setSummary("
//        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce produit est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce produit. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce produit est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l'a inventé et pourquoi. Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing.
//        ");
//        $produits[25]->setYear(2019);
//        $produits[25]->setImage("https://www.thibaultmorizet.fr/assets/98.jpeg");
//        $produits[25]->setUnitpricettc(19.9);
//        $produits[25]->setUnitpriceht(52.99);
//        $produits[25]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[25]->setIsbn("9781706785606");
//        $produits[25]->setFormat($formats[0]);
//        $produits[25]->setEditor($editors[4]);
//        $produits[25]->addAuthor($auteurs[4]);
//        $produits[25]->addCategory($categories[0]);
//        $produits[25]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[25]);
//
//        $produits[26] = new Product();
//        $produits[26]->setTitle("HTML5 & CSS3 - Créer un site web responsive");
//        $produits[26]->setSummary("
//        Dans ce produit vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5. Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.        ");
//        $produits[26]->setYear(2020);
//        $produits[26]->setImage("https://www.thibaultmorizet.fr/assets/99.jpeg");
//        $produits[26]->setUnitpricettc(19.99);
//        $produits[26]->setUnitpriceht(52.99);
//        $produits[26]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[26]->setIsbn("9788698662860");
//        $produits[26]->setFormat($formats[0]);
//        $produits[26]->setEditor($editors[4]);
//        $produits[26]->addAuthor($auteurs[4]);
//        $produits[26]->addCategory($categories[0]);
//        $produits[26]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[26]);
//
//
//        $produits[27] = new Product();
//        $produits[27]->setTitle("Réseaux informatiques - Notions fondamentales (9e édition)");
//        $produits[27]->setSummary("
//        Ingénieur en Informatique, passionné par la technologie et le partage de la connaissance, José DORDOIGNE est un expert technique dans de nombreux domaines (poste de travail et serveurs Windows, réseau et services réseau, Unix, Linux…) qui exerce aujourd'hui au sein d'une grande compagnie d'assurance française. Il est titulaire de très nombreuses certifications (plusieurs fois Microsoft Certified Systems Engineer, mais aussi Red Hat Certified Engineer Linux). Sa pédagogie et son expertise technique ont notamment été éprouvées au travers d'une expérience de près de 10 ans en tant qu'Ingénieur formateur, de démarches de conseils au sein d'une grande SSII pendant 12 années en tant qu'architecte Infrastructure, ainsi qu'avec l'écriture d'une dizaine de produits sur les systèmes d'exploitation Microsoft et les réseaux TCP/IP.
//        ");
//        $produits[27]->setYear(2022);
//        $produits[27]->setImage("https://www.thibaultmorizet.fr/assets/100.jpeg");
//        $produits[27]->setUnitpricettc(29.90);
//        $produits[27]->setUnitpriceht(52.99);
//        $produits[27]->setStock($faker->numberBetween($min = 10, $max = 50));
//        $produits[27]->setIsbn("9782409035173");
//        $produits[27]->setFormat($formats[0]);
//        $produits[27]->setEditor($editors[1]);
//        $produits[27]->addAuthor($auteurs[5]);
//        $produits[27]->addCategory($categories[1]);
//        $produits[27]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));
//
//        $manager->persist($produits[27]);
//

        $manager->flush();
    }
}
