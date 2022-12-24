<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Editor;
use App\Entity\Format;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BookFixtures extends Fixture
{
    public function __construct()
    {
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        // on crée 4 auteurs avec noms et prénoms "aléatoires" en français
        $auteurs = array();

        $auteurs[0] = new Author();
        $auteurs[0]->setLastname("Rimelé");
        $auteurs[0]->setFirstname("Rodolphe");
        $auteurs[0]->setLanguage('FR');
        $manager->persist($auteurs[0]);

        $auteurs[1] = new Author();
        $auteurs[1]->setLastname("Rollet");
        $auteurs[1]->setFirstname("Olivier");
        $auteurs[1]->setLanguage('FR');
        $manager->persist($auteurs[1]);

        $auteurs[2] = new Author();
        $auteurs[2]->setLastname("Martin");
        $auteurs[2]->setFirstname("Robert C.");
        $auteurs[2]->setLanguage('EN');
        $manager->persist($auteurs[2]);

        $auteurs[3] = new Author();
        $auteurs[3]->setLastname("Valade");
        $auteurs[3]->setFirstname("Janet");
        $auteurs[3]->setLanguage('FR');
        $manager->persist($auteurs[3]);

        $auteurs[4] = new Author();
        $auteurs[4]->setLastname("Anquetil");
        $auteurs[4]->setFirstname("Roxane");
        $auteurs[4]->setLanguage('FR');
        $manager->persist($auteurs[4]);

        $auteurs[5] = new Author();
        $auteurs[5]->setLastname("Dordoigne");
        $auteurs[5]->setFirstname("José");
        $auteurs[5]->setLanguage('FR');
        $manager->persist($auteurs[5]);

        $formats = array();

        $formats[0] = new Format();
        $formats[0]->setName("Broché");
        $manager->persist($formats[0]);

        $formats[1] = new Format();
        $formats[1]->setName("Poche");
        $manager->persist($formats[1]);

        $editors = array();

        $editors[0] = new Editor();
        $editors[0]->setName("Blanche eyrolles");
        $manager->persist($editors[0]);

        $editors[1] = new Editor();
        $editors[1]->setName("Éditions eni");
        $manager->persist($editors[1]);

        $editors[2] = new Editor();
        $editors[2]->setName("Pearson");
        $manager->persist($editors[2]);

        $editors[3] = new Editor();
        $editors[3]->setName("First Interactive");
        $manager->persist($editors[3]);

        $editors[4] = new Editor();
        $editors[4]->setName("Anquetil Roxane");
        $manager->persist($editors[4]);

        $categorys = array();

        $categorys[0] = new Category();
        $categorys[0]->setName("Programmation et langages");
        $manager->persist($categorys[0]);

        $categorys[1] = new Category();
        $categorys[1]->setName("Réseaux et télécommunication");
        $manager->persist($categorys[1]);

        $categorys[2] = new Category();
        $categorys[2]->setName("Base de données");
        $manager->persist($categorys[2]);

        // nouvelle boucle pour créer des livres

        $livres = array();

        $livres[0] = new Book();
        $livres[0]->setTitle("Html 5 - une référence pour le développeur web");
        $livres[0]->setSummary("HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
        Concevoir des sites riches, performants et accessibles avec HTML 5.
        Ce livre fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
        A qui cet ouvrage s'adresse-t-il ?
        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.");
        $livres[0]->setYear(2017);
        $livres[0]->setImage("https://www.thibaultmorizet.fr/assets/73.jpeg");
        $livres[0]->setUnitpricettc(39.00);
        $livres[0]->setUnitpriceht(52.99);
        $livres[0]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[0]->setIsbn("2212143656");
        $livres[0]->setFormat($formats[0]);
        $livres[0]->setEditor($editors[0]);
        $livres[0]->addAuthor($auteurs[0]);
        $livres[0]->addCategory($categorys[0]);
        $livres[0]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[0]);

        $livres[1] = new Book();
        $livres[1]->setTitle("Apprendre à développer un site web avec PHP et MySQL");
        $livres[1]->setSummary("Ce livre s'adresse à un public de développeurs débutants connaissant déjà le HTML et les CSS et qui souhaitent bien comprendre le fonctionnement d'une application web pour créer leurs propres sites web dynamiques avec PHP et MySQL.
            Dans une première partie, le lecteur installera son environnement de développement WAMP puis découvrira les bases du langage PHP (en version 7 au moment de l'écriture), ses principales fonctions et structures de contrôle, ainsi que des explications sur la transmission des données entre les pages et sur la librairie graphique (les effets spéciaux sur une image). Ces apports théoriques sont accompagnés de nombreux exemples.
            Il en est de même dans la deuxième partie du livre, consacrée au langage SQL. Le lecteur découvrira ce qu'est une base de données MySQL et les différentes méthodes pour y accéder avec PHP (PDO, SQL Avancé) et comment assurer la sécurité de la base. Un chapitre est également consacré aux premiers pas sur la Programmation Orientée Objet et un autre à la gestion de la configuration et des performances.
            Pour que le lecteur puisse se forger une première expérience significative, l'auteur a préparé de nombreux exercices à la fin de chaque chapitre (exemples : comme créer un blog, une newsletter, un module de paiement en ligne PayPal...) et propose aussi leurs corrigés.
            ");
        $livres[1]->setYear(2018);
        $livres[1]->setImage("https://www.thibaultmorizet.fr/assets/74.jpeg");
        $livres[1]->setUnitpricettc(29.90);
        $livres[1]->setUnitpriceht(52.99);
        $livres[1]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[1]->setIsbn("9782409015297");
        $livres[1]->setFormat($formats[0]);
        $livres[1]->setEditor($editors[1]);
        $livres[1]->addAuthor($auteurs[1]);
        $livres[1]->addCategory($categorys[0]);
        $livres[1]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[1]);

        $livres[2] = new Book();
        $livres[2]->setTitle("CODER PROPREMENT");
        $livres[2]->setSummary(" 
        Si un code sale peut fonctionner, il peut également compromettre la pérennité d'une entreprise de développement de logiciels. Chaque année, du temps et des ressources sont gaspillés à cause d'un code mal écrit. Toutefois, ce n'est pas une fatalité.
Grâce à cet ouvrage, vous apprendrez à rédiger du bon code, ainsi qu'à le nettoyer « à la volée », et vous obtiendrez des applications plus robustes, plus évolutives et donc plus durables. Concret et pédagogique, ce manuel se base sur les bonnes pratiques d'une équipe de développeurs aguerris réunie autour de Robert C. Martin, expert logiciel reconnu. Il vous inculquera les valeurs d'un artisan du logiciel et fera de vous un meilleur programmeur.
Coder proprement est décomposé en trois parties. La première décrit les principes, les motifs et les pratiques employés dans l'écriture d'un code propre. La deuxième est constituée de plusieurs études de cas à la complexité croissante. Chacune d'elles est un exercice de nettoyage: vous partirez d'un exemple de code présentant certains problèmes, et l'auteur vous expliquera comment en obtenir une version saine et performante. La troisième partie, enfin, sera votre récompense. Son unique chapitre contient une liste d'indicateurs éprouvés par l'auteur qui vous seront précieux pour repérer efficacement les défauts de votre code.
            ");
        $livres[2]->setYear(2019);
        $livres[2]->setImage("https://www.thibaultmorizet.fr/assets/75.jpeg");
        $livres[2]->setUnitpricettc(38);
        $livres[2]->setUnitpriceht(52.99);
        $livres[2]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[2]->setIsbn("9782326002272");
        $livres[2]->setFormat($formats[0]);
        $livres[2]->setEditor($editors[2]);
        $livres[2]->addAuthor($auteurs[2]);
        $livres[2]->addCategory($categorys[0]);
        $livres[2]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[2]);


        $livres[3] = new Book();
        $livres[3]->setTitle("PHP et MySQL pour les Nuls");
        $livres[3]->setSummary(" 
        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.
        Ce livre vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...
                    ");
        $livres[3]->setYear(2019);
        $livres[3]->setImage("https://www.thibaultmorizet.fr/assets/76.jpeg");
        $livres[3]->setUnitpricettc(12.5);
        $livres[3]->setUnitpriceht(52.99);
        $livres[3]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[3]->setIsbn("9782412043622");
        $livres[3]->setFormat($formats[1]);
        $livres[3]->setEditor($editors[3]);
        $livres[3]->addAuthor($auteurs[3]);
        $livres[3]->addCategory($categorys[2]);
        $livres[3]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[3]);

        $livres[4] = new Book();
        $livres[4]->setTitle("Les bases du web : Html5, Css3, JavaScript");
        $livres[4]->setSummary(" 
        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce livre est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce livre. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce livre est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l'a inventé et pourquoi. Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing. 
        ");
        $livres[4]->setYear(2019);
        $livres[4]->setImage("https://www.thibaultmorizet.fr/assets/77.jpeg");
        $livres[4]->setUnitpricettc(19.9);
        $livres[4]->setUnitpriceht(52.99);
        $livres[4]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[4]->setIsbn("9781706785606");
        $livres[4]->setFormat($formats[0]);
        $livres[4]->setEditor($editors[4]);
        $livres[4]->addAuthor($auteurs[4]);
        $livres[4]->addCategory($categorys[0]);
        $livres[4]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[4]);

        $livres[5] = new Book();
        $livres[5]->setTitle("HTML5 & CSS3 - Créer un site web responsive");
        $livres[5]->setSummary(" 
        Dans ce livre vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5. Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.        ");
        $livres[5]->setYear(2020);
        $livres[5]->setImage("https://www.thibaultmorizet.fr/assets/78.jpeg");
        $livres[5]->setUnitpricettc(19.99);
        $livres[5]->setUnitpriceht(52.99);
        $livres[5]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[5]->setIsbn("9788698662860");
        $livres[5]->setFormat($formats[0]);
        $livres[5]->setEditor($editors[4]);
        $livres[5]->addAuthor($auteurs[4]);
        $livres[5]->addCategory($categorys[0]);
        $livres[5]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[5]);


        $livres[6] = new Book();
        $livres[6]->setTitle("Réseaux informatiques - Notions fondamentales (9e édition)");
        $livres[6]->setSummary(" 
        Ingénieur en Informatique, passionné par la technologie et le partage de la connaissance, José DORDOIGNE est un expert technique dans de nombreux domaines (poste de travail et serveurs Windows, réseau et services réseau, Unix, Linux…) qui exerce aujourd'hui au sein d'une grande compagnie d'assurance française. Il est titulaire de très nombreuses certifications (plusieurs fois Microsoft Certified Systems Engineer, mais aussi Red Hat Certified Engineer Linux). Sa pédagogie et son expertise technique ont notamment été éprouvées au travers d'une expérience de près de 10 ans en tant qu'Ingénieur formateur, de démarches de conseils au sein d'une grande SSII pendant 12 années en tant qu'architecte Infrastructure, ainsi qu'avec l'écriture d'une dizaine de livres sur les systèmes d'exploitation Microsoft et les réseaux TCP/IP.
        ");
        $livres[6]->setYear(2022);
        $livres[6]->setImage("https://www.thibaultmorizet.fr/assets/79.jpeg");
        $livres[6]->setUnitpricettc(29.90);
        $livres[6]->setUnitpriceht(52.99);
        $livres[6]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[6]->setIsbn("9782409035173");
        $livres[6]->setFormat($formats[0]);
        $livres[6]->setEditor($editors[1]);
        $livres[6]->addAuthor($auteurs[5]);
        $livres[6]->addCategory($categorys[1]);
        $livres[6]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[6]);




        $livres[7] = new Book();
        $livres[7]->setTitle("Html 5 - une référence pour le développeur web");
        $livres[7]->setSummary("HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
        Concevoir des sites riches, performants et accessibles avec HTML 5.
        Ce livre fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
        A qui cet ouvrage s'adresse-t-il ?
        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.");
        $livres[7]->setYear(2017);
        $livres[7]->setImage("https://www.thibaultmorizet.fr/assets/80.jpeg");
        $livres[7]->setUnitpricettc(39.00);
        $livres[7]->setUnitpriceht(52.99);
        $livres[7]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[7]->setIsbn("2212143656");
        $livres[7]->setFormat($formats[0]);
        $livres[7]->setEditor($editors[0]);
        $livres[7]->addAuthor($auteurs[0]);
        $livres[7]->addCategory($categorys[0]);
        $livres[7]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[7]);

        $livres[8] = new Book();
        $livres[8]->setTitle("Apprendre à développer un site web avec PHP et MySQL");
        $livres[8]->setSummary("Ce livre s'adresse à un public de développeurs débutants connaissant déjà le HTML et les CSS et qui souhaitent bien comprendre le fonctionnement d'une application web pour créer leurs propres sites web dynamiques avec PHP et MySQL.
            Dans une première partie, le lecteur installera son environnement de développement WAMP puis découvrira les bases du langage PHP (en version 7 au moment de l'écriture), ses principales fonctions et structures de contrôle, ainsi que des explications sur la transmission des données entre les pages et sur la librairie graphique (les effets spéciaux sur une image). Ces apports théoriques sont accompagnés de nombreux exemples.
            Il en est de même dans la deuxième partie du livre, consacrée au langage SQL. Le lecteur découvrira ce qu'est une base de données MySQL et les différentes méthodes pour y accéder avec PHP (PDO, SQL Avancé) et comment assurer la sécurité de la base. Un chapitre est également consacré aux premiers pas sur la Programmation Orientée Objet et un autre à la gestion de la configuration et des performances.
            Pour que le lecteur puisse se forger une première expérience significative, l'auteur a préparé de nombreux exercices à la fin de chaque chapitre (exemples : comme créer un blog, une newsletter, un module de paiement en ligne PayPal...) et propose aussi leurs corrigés.
            ");
        $livres[8]->setYear(2018);
        $livres[8]->setImage("https://www.thibaultmorizet.fr/assets/81.jpeg");
        $livres[8]->setUnitpricettc(29.90);
        $livres[8]->setUnitpriceht(52.99);
        $livres[8]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[8]->setIsbn("9782409015297");
        $livres[8]->setFormat($formats[0]);
        $livres[8]->setEditor($editors[1]);
        $livres[8]->addAuthor($auteurs[1]);
        $livres[8]->addCategory($categorys[0]);
        $livres[8]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[8]);

        $livres[9] = new Book();
        $livres[9]->setTitle("CODER PROPREMENT");
        $livres[9]->setSummary(" 
        Si un code sale peut fonctionner, il peut également compromettre la pérennité d'une entreprise de développement de logiciels. Chaque année, du temps et des ressources sont gaspillés à cause d'un code mal écrit. Toutefois, ce n'est pas une fatalité.
Grâce à cet ouvrage, vous apprendrez à rédiger du bon code, ainsi qu'à le nettoyer « à la volée », et vous obtiendrez des applications plus robustes, plus évolutives et donc plus durables. Concret et pédagogique, ce manuel se base sur les bonnes pratiques d'une équipe de développeurs aguerris réunie autour de Robert C. Martin, expert logiciel reconnu. Il vous inculquera les valeurs d'un artisan du logiciel et fera de vous un meilleur programmeur.
Coder proprement est décomposé en trois parties. La première décrit les principes, les motifs et les pratiques employés dans l'écriture d'un code propre. La deuxième est constituée de plusieurs études de cas à la complexité croissante. Chacune d'elles est un exercice de nettoyage: vous partirez d'un exemple de code présentant certains problèmes, et l'auteur vous expliquera comment en obtenir une version saine et performante. La troisième partie, enfin, sera votre récompense. Son unique chapitre contient une liste d'indicateurs éprouvés par l'auteur qui vous seront précieux pour repérer efficacement les défauts de votre code.
            ");
        $livres[9]->setYear(2019);
        $livres[9]->setImage("https://www.thibaultmorizet.fr/assets/82.jpeg");
        $livres[9]->setUnitpricettc(38);
        $livres[9]->setUnitpriceht(52.99);
        $livres[9]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[9]->setIsbn("9782326002272");
        $livres[9]->setFormat($formats[0]);
        $livres[9]->setEditor($editors[2]);
        $livres[9]->addAuthor($auteurs[2]);
        $livres[9]->addCategory($categorys[0]);
        $livres[9]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[9]);


        $livres[10] = new Book();
        $livres[10]->setTitle("PHP et MySQL pour les Nuls");
        $livres[10]->setSummary(" 
        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.
        Ce livre vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...
                    ");
        $livres[10]->setYear(2019);
        $livres[10]->setImage("https://www.thibaultmorizet.fr/assets/83.jpeg");
        $livres[10]->setUnitpricettc(12.5);
        $livres[10]->setUnitpriceht(52.99);
        $livres[10]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[10]->setIsbn("9782412043622");
        $livres[10]->setFormat($formats[1]);
        $livres[10]->setEditor($editors[3]);
        $livres[10]->addAuthor($auteurs[3]);
        $livres[10]->addCategory($categorys[2]);
        $livres[10]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[10]);

        $livres[11] = new Book();
        $livres[11]->setTitle("Les bases du web : Html5, Css3, JavaScript");
        $livres[11]->setSummary(" 
        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce livre est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce livre. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce livre est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l'a inventé et pourquoi. Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing. 
        ");
        $livres[11]->setYear(2019);
        $livres[11]->setImage("https://www.thibaultmorizet.fr/assets/84.jpeg");
        $livres[11]->setUnitpricettc(19.9);
        $livres[11]->setUnitpriceht(52.99);
        $livres[11]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[11]->setIsbn("9781706785606");
        $livres[11]->setFormat($formats[0]);
        $livres[11]->setEditor($editors[4]);
        $livres[11]->addAuthor($auteurs[4]);
        $livres[11]->addCategory($categorys[0]);
        $livres[11]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[11]);

        $livres[12] = new Book();
        $livres[12]->setTitle("HTML5 & CSS3 - Créer un site web responsive");
        $livres[12]->setSummary(" 
        Dans ce livre vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5. Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.        ");
        $livres[12]->setYear(2020);
        $livres[12]->setImage("https://www.thibaultmorizet.fr/assets/85.jpeg");
        $livres[12]->setUnitpricettc(19.99);
        $livres[12]->setUnitpriceht(52.99);
        $livres[12]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[12]->setIsbn("9788698662860");
        $livres[12]->setFormat($formats[0]);
        $livres[12]->setEditor($editors[4]);
        $livres[12]->addAuthor($auteurs[4]);
        $livres[12]->addCategory($categorys[0]);
        $livres[12]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[12]);


        $livres[13] = new Book();
        $livres[13]->setTitle("Réseaux informatiques - Notions fondamentales (9e édition)");
        $livres[13]->setSummary(" 
        Ingénieur en Informatique, passionné par la technologie et le partage de la connaissance, José DORDOIGNE est un expert technique dans de nombreux domaines (poste de travail et serveurs Windows, réseau et services réseau, Unix, Linux…) qui exerce aujourd'hui au sein d'une grande compagnie d'assurance française. Il est titulaire de très nombreuses certifications (plusieurs fois Microsoft Certified Systems Engineer, mais aussi Red Hat Certified Engineer Linux). Sa pédagogie et son expertise technique ont notamment été éprouvées au travers d'une expérience de près de 10 ans en tant qu'Ingénieur formateur, de démarches de conseils au sein d'une grande SSII pendant 12 années en tant qu'architecte Infrastructure, ainsi qu'avec l'écriture d'une dizaine de livres sur les systèmes d'exploitation Microsoft et les réseaux TCP/IP.
        ");
        $livres[13]->setYear(2022);
        $livres[13]->setImage("https://www.thibaultmorizet.fr/assets/86.jpeg");
        $livres[13]->setUnitpricettc(29.90);
        $livres[13]->setUnitpriceht(52.99);
        $livres[13]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[13]->setIsbn("9782409035173");
        $livres[13]->setFormat($formats[0]);
        $livres[13]->setEditor($editors[1]);
        $livres[13]->addAuthor($auteurs[5]);
        $livres[13]->addCategory($categorys[1]);
        $livres[13]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[13]);






        $livres[14] = new Book();
        $livres[14]->setTitle("Html 5 - une référence pour le développeur web");
        $livres[14]->setSummary("HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
        Concevoir des sites riches, performants et accessibles avec HTML 5.
        Ce livre fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
        A qui cet ouvrage s'adresse-t-il ?
        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.");
        $livres[14]->setYear(2017);
        $livres[14]->setImage("https://www.thibaultmorizet.fr/assets/87.jpeg");
        $livres[14]->setUnitpricettc(39.00);
        $livres[14]->setUnitpriceht(52.99);
        $livres[14]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[14]->setIsbn("2212143656");
        $livres[14]->setFormat($formats[0]);
        $livres[14]->setEditor($editors[0]);
        $livres[14]->addAuthor($auteurs[0]);
        $livres[14]->addCategory($categorys[0]);
        $livres[14]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[14]);

        $livres[15] = new Book();
        $livres[15]->setTitle("Apprendre à développer un site web avec PHP et MySQL");
        $livres[15]->setSummary("Ce livre s'adresse à un public de développeurs débutants connaissant déjà le HTML et les CSS et qui souhaitent bien comprendre le fonctionnement d'une application web pour créer leurs propres sites web dynamiques avec PHP et MySQL.
            Dans une première partie, le lecteur installera son environnement de développement WAMP puis découvrira les bases du langage PHP (en version 7 au moment de l'écriture), ses principales fonctions et structures de contrôle, ainsi que des explications sur la transmission des données entre les pages et sur la librairie graphique (les effets spéciaux sur une image). Ces apports théoriques sont accompagnés de nombreux exemples.
            Il en est de même dans la deuxième partie du livre, consacrée au langage SQL. Le lecteur découvrira ce qu'est une base de données MySQL et les différentes méthodes pour y accéder avec PHP (PDO, SQL Avancé) et comment assurer la sécurité de la base. Un chapitre est également consacré aux premiers pas sur la Programmation Orientée Objet et un autre à la gestion de la configuration et des performances.
            Pour que le lecteur puisse se forger une première expérience significative, l'auteur a préparé de nombreux exercices à la fin de chaque chapitre (exemples : comme créer un blog, une newsletter, un module de paiement en ligne PayPal...) et propose aussi leurs corrigés.
            ");
        $livres[15]->setYear(2018);
        $livres[15]->setImage("https://www.thibaultmorizet.fr/assets/88.jpeg");
        $livres[15]->setUnitpricettc(29.90);
        $livres[15]->setUnitpriceht(52.99);
        $livres[15]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[15]->setIsbn("9782409015297");
        $livres[15]->setFormat($formats[0]);
        $livres[15]->setEditor($editors[1]);
        $livres[15]->addAuthor($auteurs[1]);
        $livres[15]->addCategory($categorys[0]);
        $livres[15]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[15]);

        $livres[16] = new Book();
        $livres[16]->setTitle("CODER PROPREMENT");
        $livres[16]->setSummary(" 
        Si un code sale peut fonctionner, il peut également compromettre la pérennité d'une entreprise de développement de logiciels. Chaque année, du temps et des ressources sont gaspillés à cause d'un code mal écrit. Toutefois, ce n'est pas une fatalité.
Grâce à cet ouvrage, vous apprendrez à rédiger du bon code, ainsi qu'à le nettoyer « à la volée », et vous obtiendrez des applications plus robustes, plus évolutives et donc plus durables. Concret et pédagogique, ce manuel se base sur les bonnes pratiques d'une équipe de développeurs aguerris réunie autour de Robert C. Martin, expert logiciel reconnu. Il vous inculquera les valeurs d'un artisan du logiciel et fera de vous un meilleur programmeur.
Coder proprement est décomposé en trois parties. La première décrit les principes, les motifs et les pratiques employés dans l'écriture d'un code propre. La deuxième est constituée de plusieurs études de cas à la complexité croissante. Chacune d'elles est un exercice de nettoyage: vous partirez d'un exemple de code présentant certains problèmes, et l'auteur vous expliquera comment en obtenir une version saine et performante. La troisième partie, enfin, sera votre récompense. Son unique chapitre contient une liste d'indicateurs éprouvés par l'auteur qui vous seront précieux pour repérer efficacement les défauts de votre code.
            ");
        $livres[16]->setYear(2019);
        $livres[16]->setImage("https://www.thibaultmorizet.fr/assets/89.jpeg");
        $livres[16]->setUnitpricettc(38);
        $livres[16]->setUnitpriceht(52.99);
        $livres[16]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[16]->setIsbn("9782326002272");
        $livres[16]->setFormat($formats[0]);
        $livres[16]->setEditor($editors[2]);
        $livres[16]->addAuthor($auteurs[2]);
        $livres[16]->addCategory($categorys[0]);
        $livres[16]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[16]);


        $livres[17] = new Book();
        $livres[17]->setTitle("PHP et MySQL pour les Nuls");
        $livres[17]->setSummary(" 
        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.
        Ce livre vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...
                    ");
        $livres[17]->setYear(2019);
        $livres[17]->setImage("https://www.thibaultmorizet.fr/assets/90.jpeg");
        $livres[17]->setUnitpricettc(12.5);
        $livres[17]->setUnitpriceht(52.99);
        $livres[17]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[17]->setIsbn("9782412043622");
        $livres[17]->setFormat($formats[1]);
        $livres[17]->setEditor($editors[3]);
        $livres[17]->addAuthor($auteurs[3]);
        $livres[17]->addCategory($categorys[2]);
        $livres[17]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[17]);

        $livres[18] = new Book();
        $livres[18]->setTitle("Les bases du web : Html5, Css3, JavaScript");
        $livres[18]->setSummary(" 
        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce livre est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce livre. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce livre est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l'a inventé et pourquoi. Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing. 
        ");
        $livres[18]->setYear(2019);
        $livres[18]->setImage("https://www.thibaultmorizet.fr/assets/91.jpeg");
        $livres[18]->setUnitpricettc(19.9);
        $livres[18]->setUnitpriceht(52.99);
        $livres[18]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[18]->setIsbn("9781706785606");
        $livres[18]->setFormat($formats[0]);
        $livres[18]->setEditor($editors[4]);
        $livres[18]->addAuthor($auteurs[4]);
        $livres[18]->addCategory($categorys[0]);
        $livres[18]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[18]);

        $livres[19] = new Book();
        $livres[19]->setTitle("HTML5 & CSS3 - Créer un site web responsive");
        $livres[19]->setSummary(" 
        Dans ce livre vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5. Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.        ");
        $livres[19]->setYear(2020);
        $livres[19]->setImage("https://www.thibaultmorizet.fr/assets/92.jpeg");
        $livres[19]->setUnitpricettc(19.99);
        $livres[19]->setUnitpriceht(52.99);
        $livres[19]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[19]->setIsbn("9788698662860");
        $livres[19]->setFormat($formats[0]);
        $livres[19]->setEditor($editors[4]);
        $livres[19]->addAuthor($auteurs[4]);
        $livres[19]->addCategory($categorys[0]);
        $livres[19]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[19]);


        $livres[20] = new Book();
        $livres[20]->setTitle("Réseaux informatiques - Notions fondamentales (9e édition)");
        $livres[20]->setSummary(" 
        Ingénieur en Informatique, passionné par la technologie et le partage de la connaissance, José DORDOIGNE est un expert technique dans de nombreux domaines (poste de travail et serveurs Windows, réseau et services réseau, Unix, Linux…) qui exerce aujourd'hui au sein d'une grande compagnie d'assurance française. Il est titulaire de très nombreuses certifications (plusieurs fois Microsoft Certified Systems Engineer, mais aussi Red Hat Certified Engineer Linux). Sa pédagogie et son expertise technique ont notamment été éprouvées au travers d'une expérience de près de 10 ans en tant qu'Ingénieur formateur, de démarches de conseils au sein d'une grande SSII pendant 12 années en tant qu'architecte Infrastructure, ainsi qu'avec l'écriture d'une dizaine de livres sur les systèmes d'exploitation Microsoft et les réseaux TCP/IP.
        ");
        $livres[20]->setYear(2022);
        $livres[20]->setImage("https://www.thibaultmorizet.fr/assets/93.jpeg");
        $livres[20]->setUnitpricettc(29.90);
        $livres[20]->setUnitpriceht(52.99);
        $livres[20]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[20]->setIsbn("9782409035173");
        $livres[20]->setFormat($formats[0]);
        $livres[20]->setEditor($editors[1]);
        $livres[20]->addAuthor($auteurs[5]);
        $livres[20]->addCategory($categorys[1]);
        $livres[20]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[20]);









        $livres[21] = new Book();
        $livres[21]->setTitle("Html 5 - une référence pour le développeur web");
        $livres[21]->setSummary("HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
        Concevoir des sites riches, performants et accessibles avec HTML 5.
        Ce livre fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
        A qui cet ouvrage s'adresse-t-il ?
        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.");
        $livres[21]->setYear(2017);
        $livres[21]->setImage("https://www.thibaultmorizet.fr/assets/94.jpeg");
        $livres[21]->setUnitpricettc(39.00);
        $livres[21]->setUnitpriceht(52.99);
        $livres[21]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[21]->setIsbn("2212143656");
        $livres[21]->setFormat($formats[0]);
        $livres[21]->setEditor($editors[0]);
        $livres[21]->addAuthor($auteurs[0]);
        $livres[21]->addCategory($categorys[0]);
        $livres[21]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[21]);

        $livres[22] = new Book();
        $livres[22]->setTitle("Apprendre à développer un site web avec PHP et MySQL");
        $livres[22]->setSummary("Ce livre s'adresse à un public de développeurs débutants connaissant déjà le HTML et les CSS et qui souhaitent bien comprendre le fonctionnement d'une application web pour créer leurs propres sites web dynamiques avec PHP et MySQL.
            Dans une première partie, le lecteur installera son environnement de développement WAMP puis découvrira les bases du langage PHP (en version 7 au moment de l'écriture), ses principales fonctions et structures de contrôle, ainsi que des explications sur la transmission des données entre les pages et sur la librairie graphique (les effets spéciaux sur une image). Ces apports théoriques sont accompagnés de nombreux exemples.
            Il en est de même dans la deuxième partie du livre, consacrée au langage SQL. Le lecteur découvrira ce qu'est une base de données MySQL et les différentes méthodes pour y accéder avec PHP (PDO, SQL Avancé) et comment assurer la sécurité de la base. Un chapitre est également consacré aux premiers pas sur la Programmation Orientée Objet et un autre à la gestion de la configuration et des performances.
            Pour que le lecteur puisse se forger une première expérience significative, l'auteur a préparé de nombreux exercices à la fin de chaque chapitre (exemples : comme créer un blog, une newsletter, un module de paiement en ligne PayPal...) et propose aussi leurs corrigés.
            ");
        $livres[22]->setYear(2018);
        $livres[22]->setImage("https://www.thibaultmorizet.fr/assets/95.jpeg");
        $livres[22]->setUnitpricettc(29.90);
        $livres[22]->setUnitpriceht(52.99);
        $livres[22]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[22]->setIsbn("9782409015297");
        $livres[22]->setFormat($formats[0]);
        $livres[22]->setEditor($editors[1]);
        $livres[22]->addAuthor($auteurs[1]);
        $livres[22]->addCategory($categorys[0]);
        $livres[22]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[22]);

        $livres[23] = new Book();
        $livres[23]->setTitle("CODER PROPREMENT");
        $livres[23]->setSummary(" 
        Si un code sale peut fonctionner, il peut également compromettre la pérennité d'une entreprise de développement de logiciels. Chaque année, du temps et des ressources sont gaspillés à cause d'un code mal écrit. Toutefois, ce n'est pas une fatalité.
Grâce à cet ouvrage, vous apprendrez à rédiger du bon code, ainsi qu'à le nettoyer « à la volée », et vous obtiendrez des applications plus robustes, plus évolutives et donc plus durables. Concret et pédagogique, ce manuel se base sur les bonnes pratiques d'une équipe de développeurs aguerris réunie autour de Robert C. Martin, expert logiciel reconnu. Il vous inculquera les valeurs d'un artisan du logiciel et fera de vous un meilleur programmeur.
Coder proprement est décomposé en trois parties. La première décrit les principes, les motifs et les pratiques employés dans l'écriture d'un code propre. La deuxième est constituée de plusieurs études de cas à la complexité croissante. Chacune d'elles est un exercice de nettoyage: vous partirez d'un exemple de code présentant certains problèmes, et l'auteur vous expliquera comment en obtenir une version saine et performante. La troisième partie, enfin, sera votre récompense. Son unique chapitre contient une liste d'indicateurs éprouvés par l'auteur qui vous seront précieux pour repérer efficacement les défauts de votre code.
            ");
        $livres[23]->setYear(2019);
        $livres[23]->setImage("https://www.thibaultmorizet.fr/assets/96.jpeg");
        $livres[23]->setUnitpricettc(38);
        $livres[23]->setUnitpriceht(52.99);
        $livres[23]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[23]->setIsbn("9782326002272");
        $livres[23]->setFormat($formats[0]);
        $livres[23]->setEditor($editors[2]);
        $livres[23]->addAuthor($auteurs[2]);
        $livres[23]->addCategory($categorys[0]);
        $livres[23]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[23]);


        $livres[24] = new Book();
        $livres[24]->setTitle("PHP et MySQL pour les Nuls");
        $livres[24]->setSummary(" 
        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.
        Ce livre vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...
                    ");
        $livres[24]->setYear(2019);
        $livres[24]->setImage("https://www.thibaultmorizet.fr/assets/97.jpeg");
        $livres[24]->setUnitpricettc(12.5);
        $livres[24]->setUnitpriceht(52.99);
        $livres[24]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[24]->setIsbn("9782412043622");
        $livres[24]->setFormat($formats[1]);
        $livres[24]->setEditor($editors[3]);
        $livres[24]->addAuthor($auteurs[3]);
        $livres[24]->addCategory($categorys[2]);
        $livres[24]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[24]);

        $livres[25] = new Book();
        $livres[25]->setTitle("Les bases du web : Html5, Css3, JavaScript");
        $livres[25]->setSummary(" 
        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce livre est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce livre. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce livre est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l'a inventé et pourquoi. Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing. 
        ");
        $livres[25]->setYear(2019);
        $livres[25]->setImage("https://www.thibaultmorizet.fr/assets/98.jpeg");
        $livres[25]->setUnitpricettc(19.9);
        $livres[25]->setUnitpriceht(52.99);
        $livres[25]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[25]->setIsbn("9781706785606");
        $livres[25]->setFormat($formats[0]);
        $livres[25]->setEditor($editors[4]);
        $livres[25]->addAuthor($auteurs[4]);
        $livres[25]->addCategory($categorys[0]);
        $livres[25]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[25]);

        $livres[26] = new Book();
        $livres[26]->setTitle("HTML5 & CSS3 - Créer un site web responsive");
        $livres[26]->setSummary(" 
        Dans ce livre vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5. Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.        ");
        $livres[26]->setYear(2020);
        $livres[26]->setImage("https://www.thibaultmorizet.fr/assets/99.jpeg");
        $livres[26]->setUnitpricettc(19.99);
        $livres[26]->setUnitpriceht(52.99);
        $livres[26]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[26]->setIsbn("9788698662860");
        $livres[26]->setFormat($formats[0]);
        $livres[26]->setEditor($editors[4]);
        $livres[26]->addAuthor($auteurs[4]);
        $livres[26]->addCategory($categorys[0]);
        $livres[26]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[26]);


        $livres[27] = new Book();
        $livres[27]->setTitle("Réseaux informatiques - Notions fondamentales (9e édition)");
        $livres[27]->setSummary(" 
        Ingénieur en Informatique, passionné par la technologie et le partage de la connaissance, José DORDOIGNE est un expert technique dans de nombreux domaines (poste de travail et serveurs Windows, réseau et services réseau, Unix, Linux…) qui exerce aujourd'hui au sein d'une grande compagnie d'assurance française. Il est titulaire de très nombreuses certifications (plusieurs fois Microsoft Certified Systems Engineer, mais aussi Red Hat Certified Engineer Linux). Sa pédagogie et son expertise technique ont notamment été éprouvées au travers d'une expérience de près de 10 ans en tant qu'Ingénieur formateur, de démarches de conseils au sein d'une grande SSII pendant 12 années en tant qu'architecte Infrastructure, ainsi qu'avec l'écriture d'une dizaine de livres sur les systèmes d'exploitation Microsoft et les réseaux TCP/IP.
        ");
        $livres[27]->setYear(2022);
        $livres[27]->setImage("https://www.thibaultmorizet.fr/assets/100.jpeg");
        $livres[27]->setUnitpricettc(29.90);
        $livres[27]->setUnitpriceht(52.99);
        $livres[27]->setStock($faker->numberBetween($min = 10, $max = 50));
        $livres[27]->setIsbn("9782409035173");
        $livres[27]->setFormat($formats[0]);
        $livres[27]->setEditor($editors[1]);
        $livres[27]->addAuthor($auteurs[5]);
        $livres[27]->addCategory($categorys[1]);
        $livres[27]->setVisitnumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[27]);



        $manager->flush();
    }
}
