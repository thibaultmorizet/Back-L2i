<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Editor;
use App\Entity\Format;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

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
        $auteurs[0]->setAuthorLastname("Rimelé");
        $auteurs[0]->setAuthorFirstname("Rodolphe");
        $auteurs[0]->setAuthorLanguage('FR');
        $manager->persist($auteurs[0]);

        $auteurs[1] = new Author();
        $auteurs[1]->setAuthorLastname("Rollet");
        $auteurs[1]->setAuthorFirstname("Olivier");
        $auteurs[1]->setAuthorLanguage('FR');
        $manager->persist($auteurs[1]);

        $auteurs[2] = new Author();
        $auteurs[2]->setAuthorLastname("Martin");
        $auteurs[2]->setAuthorFirstname("Robert C.");
        $auteurs[2]->setAuthorLanguage('EN');
        $manager->persist($auteurs[2]);

        $auteurs[3] = new Author();
        $auteurs[3]->setAuthorLastname("Valade");
        $auteurs[3]->setAuthorFirstname("Janet");
        $auteurs[3]->setAuthorLanguage('FR');
        $manager->persist($auteurs[3]);

        $auteurs[4] = new Author();
        $auteurs[4]->setAuthorLastname("Anquetil");
        $auteurs[4]->setAuthorFirstname("Roxane");
        $auteurs[4]->setAuthorLanguage('FR');
        $manager->persist($auteurs[4]);

        $formats = array();

        $formats[0] = new Format();
        $formats[0]->setFormatName("Broché");
        $manager->persist($formats[0]);

        $formats[1] = new Format();
        $formats[1]->setFormatName("Poche");
        $manager->persist($formats[1]);

        $editors = array();

        $editors[0] = new Editor();
        $editors[0]->setEditorName("Blanche eyrolles");
        $manager->persist($editors[0]);

        $editors[1] = new Editor();
        $editors[1]->setEditorName("Éditions eni");
        $manager->persist($editors[1]);

        $editors[2] = new Editor();
        $editors[2]->setEditorName("Pearson");
        $manager->persist($editors[2]);

        $editors[3] = new Editor();
        $editors[3]->setEditorName("First Interactive");
        $manager->persist($editors[3]);

        $editors[4] = new Editor();
        $editors[4]->setEditorName("Anquetil Roxane");
        $manager->persist($editors[4]);

        // nouvelle boucle pour créer des livres

        $livres = array();

        $livres[0] = new Book();
        $livres[0]->setBookTitle("Html 5 - une référence pour le développeur web");
        $livres[0]->setBookSummary("HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
        Concevoir des sites riches, performants et accessibles avec HTML 5.
        Ce livre fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
        A qui cet ouvrage s'adresse-t-il ?
        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.");
        $livres[0]->setBookYear(2017);
        $livres[0]->setBookImage("./../assets/49.jpeg");
        $livres[0]->setBookUnitPrice(39.00);
        $livres[0]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[0]->setBookIsbn("2212143656");
        $livres[0]->setBookFormat($formats[0]);
        $livres[0]->setBookEditor($editors[0]);
        $livres[0]->addBookAuthor($auteurs[0]);
        $livres[0]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[0]);

        $livres[1] = new Book();
        $livres[1]->setBookTitle("Apprendre à développer un site web avec PHP et MySQL");
        $livres[1]->setBookSummary("Ce livre s'adresse à un public de développeurs débutants connaissant déjà le HTML et les CSS et qui souhaitent bien comprendre le fonctionnement d'une application web pour créer leurs propres sites web dynamiques avec PHP et MySQL.
            Dans une première partie, le lecteur installera son environnement de développement WAMP puis découvrira les bases du langage PHP (en version 7 au moment de l'écriture), ses principales fonctions et structures de contrôle, ainsi que des explications sur la transmission des données entre les pages et sur la librairie graphique (les effets spéciaux sur une image). Ces apports théoriques sont accompagnés de nombreux exemples.
            Il en est de même dans la deuxième partie du livre, consacrée au langage SQL. Le lecteur découvrira ce qu'est une base de données MySQL et les différentes méthodes pour y accéder avec PHP (PDO, SQL Avancé) et comment assurer la sécurité de la base. Un chapitre est également consacré aux premiers pas sur la Programmation Orientée Objet et un autre à la gestion de la configuration et des performances.
            Pour que le lecteur puisse se forger une première expérience significative, l'auteur a préparé de nombreux exercices à la fin de chaque chapitre (exemples : comme créer un blog, une newsletter, un module de paiement en ligne PayPal...) et propose aussi leurs corrigés.
            ");
        $livres[1]->setBookYear(2018);
        $livres[1]->setBookImage("./../assets/50.jpeg");
        $livres[1]->setBookUnitPrice(29.90);
        $livres[1]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[1]->setBookIsbn("9782409015297");
        $livres[1]->setBookFormat($formats[0]);
        $livres[1]->setBookEditor($editors[1]);
        $livres[1]->addBookAuthor($auteurs[1]);
        $livres[1]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[1]);

        $livres[2] = new Book();
        $livres[2]->setBookTitle("CODER PROPREMENT");
        $livres[2]->setBookSummary(" 
        Si un code sale peut fonctionner, il peut également compromettre la pérennité d'une entreprise de développement de logiciels. Chaque année, du temps et des ressources sont gaspillés à cause d'un code mal écrit. Toutefois, ce n'est pas une fatalité.
Grâce à cet ouvrage, vous apprendrez à rédiger du bon code, ainsi qu'à le nettoyer « à la volée », et vous obtiendrez des applications plus robustes, plus évolutives et donc plus durables. Concret et pédagogique, ce manuel se base sur les bonnes pratiques d'une équipe de développeurs aguerris réunie autour de Robert C. Martin, expert logiciel reconnu. Il vous inculquera les valeurs d'un artisan du logiciel et fera de vous un meilleur programmeur.
Coder proprement est décomposé en trois parties. La première décrit les principes, les motifs et les pratiques employés dans l'écriture d'un code propre. La deuxième est constituée de plusieurs études de cas à la complexité croissante. Chacune d'elles est un exercice de nettoyage: vous partirez d'un exemple de code présentant certains problèmes, et l'auteur vous expliquera comment en obtenir une version saine et performante. La troisième partie, enfin, sera votre récompense. Son unique chapitre contient une liste d'indicateurs éprouvés par l'auteur qui vous seront précieux pour repérer efficacement les défauts de votre code.
            ");
        $livres[2]->setBookYear(2019);
        $livres[2]->setBookImage("./../assets/51.jpeg");
        $livres[2]->setBookUnitPrice(38);
        $livres[2]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[2]->setBookIsbn("9782326002272");
        $livres[2]->setBookFormat($formats[0]);
        $livres[2]->setBookEditor($editors[2]);
        $livres[2]->addBookAuthor($auteurs[2]);
        $livres[2]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[2]);


        $livres[3] = new Book();
        $livres[3]->setBookTitle("PHP et MySQL pour les Nuls");
        $livres[3]->setBookSummary(" 
        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.
        Ce livre vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...
                    ");
        $livres[3]->setBookYear(2019);
        $livres[3]->setBookImage("./../assets/52.jpeg");
        $livres[3]->setBookUnitPrice(12.5);
        $livres[3]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[3]->setBookIsbn("9782412043622");
        $livres[3]->setBookFormat($formats[1]);
        $livres[3]->setBookEditor($editors[3]);
        $livres[3]->addBookAuthor($auteurs[3]);
        $livres[3]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[3]);

        $livres[4] = new Book();
        $livres[4]->setBookTitle("Les bases du web : Html5, Css3, JavaScript");
        $livres[4]->setBookSummary(" 
        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce livre est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce livre. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce livre est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l'a inventé et pourquoi. Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing. 
        ");
        $livres[4]->setBookYear(2019);
        $livres[4]->setBookImage("./../assets/53.jpeg");
        $livres[4]->setBookUnitPrice(19.9);
        $livres[4]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[4]->setBookIsbn("9781706785606");
        $livres[4]->setBookFormat($formats[0]);
        $livres[4]->setBookEditor($editors[4]);
        $livres[4]->addBookAuthor($auteurs[4]);
        $livres[4]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[4]);

        $livres[5] = new Book();
        $livres[5]->setBookTitle("HTML5 & CSS3 - Créer un site web responsive");
        $livres[5]->setBookSummary(" 
        Dans ce livre vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5. Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.        ");
        $livres[5]->setBookYear(2020);
        $livres[5]->setBookImage("./../assets/54.jpeg");
        $livres[5]->setBookUnitPrice(19.99);
        $livres[5]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[5]->setBookIsbn("9788698662860");
        $livres[5]->setBookFormat($formats[0]);
        $livres[5]->setBookEditor($editors[4]);
        $livres[5]->addBookAuthor($auteurs[4]);
        $livres[5]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[5]);




        $livres[6] = new Book();
        $livres[6]->setBookTitle("Html 5 - une référence pour le développeur web");
        $livres[6]->setBookSummary("HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
        Concevoir des sites riches, performants et accessibles avec HTML 5.
        Ce livre fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
        A qui cet ouvrage s'adresse-t-il ?
        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.");
        $livres[6]->setBookYear(2017);
        $livres[6]->setBookImage("./../assets/55.jpeg");
        $livres[6]->setBookUnitPrice(39.00);
        $livres[6]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[6]->setBookIsbn("2212143656");
        $livres[6]->setBookFormat($formats[0]);
        $livres[6]->setBookEditor($editors[0]);
        $livres[6]->addBookAuthor($auteurs[0]);
        $livres[6]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[6]);

        $livres[7] = new Book();
        $livres[7]->setBookTitle("Apprendre à développer un site web avec PHP et MySQL");
        $livres[7]->setBookSummary("Ce livre s'adresse à un public de développeurs débutants connaissant déjà le HTML et les CSS et qui souhaitent bien comprendre le fonctionnement d'une application web pour créer leurs propres sites web dynamiques avec PHP et MySQL.
            Dans une première partie, le lecteur installera son environnement de développement WAMP puis découvrira les bases du langage PHP (en version 7 au moment de l'écriture), ses principales fonctions et structures de contrôle, ainsi que des explications sur la transmission des données entre les pages et sur la librairie graphique (les effets spéciaux sur une image). Ces apports théoriques sont accompagnés de nombreux exemples.
            Il en est de même dans la deuxième partie du livre, consacrée au langage SQL. Le lecteur découvrira ce qu'est une base de données MySQL et les différentes méthodes pour y accéder avec PHP (PDO, SQL Avancé) et comment assurer la sécurité de la base. Un chapitre est également consacré aux premiers pas sur la Programmation Orientée Objet et un autre à la gestion de la configuration et des performances.
            Pour que le lecteur puisse se forger une première expérience significative, l'auteur a préparé de nombreux exercices à la fin de chaque chapitre (exemples : comme créer un blog, une newsletter, un module de paiement en ligne PayPal...) et propose aussi leurs corrigés.
            ");
        $livres[7]->setBookYear(2018);
        $livres[7]->setBookImage("./../assets/56.jpeg");
        $livres[7]->setBookUnitPrice(29.90);
        $livres[7]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[7]->setBookIsbn("9782409015297");
        $livres[7]->setBookFormat($formats[0]);
        $livres[7]->setBookEditor($editors[1]);
        $livres[7]->addBookAuthor($auteurs[1]);
        $livres[7]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[7]);

        $livres[8] = new Book();
        $livres[8]->setBookTitle("CODER PROPREMENT");
        $livres[8]->setBookSummary(" 
        Si un code sale peut fonctionner, il peut également compromettre la pérennité d'une entreprise de développement de logiciels. Chaque année, du temps et des ressources sont gaspillés à cause d'un code mal écrit. Toutefois, ce n'est pas une fatalité.
Grâce à cet ouvrage, vous apprendrez à rédiger du bon code, ainsi qu'à le nettoyer « à la volée », et vous obtiendrez des applications plus robustes, plus évolutives et donc plus durables. Concret et pédagogique, ce manuel se base sur les bonnes pratiques d'une équipe de développeurs aguerris réunie autour de Robert C. Martin, expert logiciel reconnu. Il vous inculquera les valeurs d'un artisan du logiciel et fera de vous un meilleur programmeur.
Coder proprement est décomposé en trois parties. La première décrit les principes, les motifs et les pratiques employés dans l'écriture d'un code propre. La deuxième est constituée de plusieurs études de cas à la complexité croissante. Chacune d'elles est un exercice de nettoyage: vous partirez d'un exemple de code présentant certains problèmes, et l'auteur vous expliquera comment en obtenir une version saine et performante. La troisième partie, enfin, sera votre récompense. Son unique chapitre contient une liste d'indicateurs éprouvés par l'auteur qui vous seront précieux pour repérer efficacement les défauts de votre code.
            ");
        $livres[8]->setBookYear(2019);
        $livres[8]->setBookImage("./../assets/57.jpeg");
        $livres[8]->setBookUnitPrice(38);
        $livres[8]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[8]->setBookIsbn("9782326002272");
        $livres[8]->setBookFormat($formats[0]);
        $livres[8]->setBookEditor($editors[2]);
        $livres[8]->addBookAuthor($auteurs[2]);
        $livres[8]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[8]);


        $livres[9] = new Book();
        $livres[9]->setBookTitle("PHP et MySQL pour les Nuls");
        $livres[9]->setBookSummary(" 
        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.
        Ce livre vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...
                    ");
        $livres[9]->setBookYear(2019);
        $livres[9]->setBookImage("./../assets/58.jpeg");
        $livres[9]->setBookUnitPrice(12.5);
        $livres[9]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[9]->setBookIsbn("9782412043622");
        $livres[9]->setBookFormat($formats[1]);
        $livres[9]->setBookEditor($editors[3]);
        $livres[9]->addBookAuthor($auteurs[3]);
        $livres[9]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[9]);

        $livres[10] = new Book();
        $livres[10]->setBookTitle("Les bases du web : Html5, Css3, JavaScript");
        $livres[10]->setBookSummary(" 
        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce livre est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce livre. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce livre est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l'a inventé et pourquoi. Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing. 
        ");
        $livres[10]->setBookYear(2019);
        $livres[10]->setBookImage("./../assets/59.jpeg");
        $livres[10]->setBookUnitPrice(19.9);
        $livres[10]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[10]->setBookIsbn("9781706785606");
        $livres[10]->setBookFormat($formats[0]);
        $livres[10]->setBookEditor($editors[4]);
        $livres[10]->addBookAuthor($auteurs[4]);
        $livres[10]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[10]);

        $livres[11] = new Book();
        $livres[11]->setBookTitle("HTML5 & CSS3 - Créer un site web responsive");
        $livres[11]->setBookSummary(" 
        Dans ce livre vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5. Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.        ");
        $livres[11]->setBookYear(2020);
        $livres[11]->setBookImage("./../assets/60.jpeg");
        $livres[11]->setBookUnitPrice(19.99);
        $livres[11]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[11]->setBookIsbn("9788698662860");
        $livres[11]->setBookFormat($formats[0]);
        $livres[11]->setBookEditor($editors[4]);
        $livres[11]->addBookAuthor($auteurs[4]);
        $livres[11]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[11]);






        $livres[12] = new Book();
        $livres[12]->setBookTitle("Html 5 - une référence pour le développeur web");
        $livres[12]->setBookSummary("HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
        Concevoir des sites riches, performants et accessibles avec HTML 5.
        Ce livre fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
        A qui cet ouvrage s'adresse-t-il ?
        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.");
        $livres[12]->setBookYear(2017);
        $livres[12]->setBookImage("./../assets/61.jpeg");
        $livres[12]->setBookUnitPrice(39.00);
        $livres[12]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[12]->setBookIsbn("2212143656");
        $livres[12]->setBookFormat($formats[0]);
        $livres[12]->setBookEditor($editors[0]);
        $livres[12]->addBookAuthor($auteurs[0]);
        $livres[12]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[12]);

        $livres[13] = new Book();
        $livres[13]->setBookTitle("Apprendre à développer un site web avec PHP et MySQL");
        $livres[13]->setBookSummary("Ce livre s'adresse à un public de développeurs débutants connaissant déjà le HTML et les CSS et qui souhaitent bien comprendre le fonctionnement d'une application web pour créer leurs propres sites web dynamiques avec PHP et MySQL.
            Dans une première partie, le lecteur installera son environnement de développement WAMP puis découvrira les bases du langage PHP (en version 7 au moment de l'écriture), ses principales fonctions et structures de contrôle, ainsi que des explications sur la transmission des données entre les pages et sur la librairie graphique (les effets spéciaux sur une image). Ces apports théoriques sont accompagnés de nombreux exemples.
            Il en est de même dans la deuxième partie du livre, consacrée au langage SQL. Le lecteur découvrira ce qu'est une base de données MySQL et les différentes méthodes pour y accéder avec PHP (PDO, SQL Avancé) et comment assurer la sécurité de la base. Un chapitre est également consacré aux premiers pas sur la Programmation Orientée Objet et un autre à la gestion de la configuration et des performances.
            Pour que le lecteur puisse se forger une première expérience significative, l'auteur a préparé de nombreux exercices à la fin de chaque chapitre (exemples : comme créer un blog, une newsletter, un module de paiement en ligne PayPal...) et propose aussi leurs corrigés.
            ");
        $livres[13]->setBookYear(2018);
        $livres[13]->setBookImage("./../assets/62.jpeg");
        $livres[13]->setBookUnitPrice(29.90);
        $livres[13]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[13]->setBookIsbn("9782409015297");
        $livres[13]->setBookFormat($formats[0]);
        $livres[13]->setBookEditor($editors[1]);
        $livres[13]->addBookAuthor($auteurs[1]);
        $livres[13]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[13]);

        $livres[14] = new Book();
        $livres[14]->setBookTitle("CODER PROPREMENT");
        $livres[14]->setBookSummary(" 
        Si un code sale peut fonctionner, il peut également compromettre la pérennité d'une entreprise de développement de logiciels. Chaque année, du temps et des ressources sont gaspillés à cause d'un code mal écrit. Toutefois, ce n'est pas une fatalité.
Grâce à cet ouvrage, vous apprendrez à rédiger du bon code, ainsi qu'à le nettoyer « à la volée », et vous obtiendrez des applications plus robustes, plus évolutives et donc plus durables. Concret et pédagogique, ce manuel se base sur les bonnes pratiques d'une équipe de développeurs aguerris réunie autour de Robert C. Martin, expert logiciel reconnu. Il vous inculquera les valeurs d'un artisan du logiciel et fera de vous un meilleur programmeur.
Coder proprement est décomposé en trois parties. La première décrit les principes, les motifs et les pratiques employés dans l'écriture d'un code propre. La deuxième est constituée de plusieurs études de cas à la complexité croissante. Chacune d'elles est un exercice de nettoyage: vous partirez d'un exemple de code présentant certains problèmes, et l'auteur vous expliquera comment en obtenir une version saine et performante. La troisième partie, enfin, sera votre récompense. Son unique chapitre contient une liste d'indicateurs éprouvés par l'auteur qui vous seront précieux pour repérer efficacement les défauts de votre code.
            ");
        $livres[14]->setBookYear(2019);
        $livres[14]->setBookImage("./../assets/63.jpeg");
        $livres[14]->setBookUnitPrice(38);
        $livres[14]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[14]->setBookIsbn("9782326002272");
        $livres[14]->setBookFormat($formats[0]);
        $livres[14]->setBookEditor($editors[2]);
        $livres[14]->addBookAuthor($auteurs[2]);
        $livres[14]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[14]);


        $livres[15] = new Book();
        $livres[15]->setBookTitle("PHP et MySQL pour les Nuls");
        $livres[15]->setBookSummary(" 
        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.
        Ce livre vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...
                    ");
        $livres[15]->setBookYear(2019);
        $livres[15]->setBookImage("./../assets/64.jpeg");
        $livres[15]->setBookUnitPrice(12.5);
        $livres[15]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[15]->setBookIsbn("9782412043622");
        $livres[15]->setBookFormat($formats[1]);
        $livres[15]->setBookEditor($editors[3]);
        $livres[15]->addBookAuthor($auteurs[3]);
        $livres[15]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[15]);

        $livres[16] = new Book();
        $livres[16]->setBookTitle("Les bases du web : Html5, Css3, JavaScript");
        $livres[16]->setBookSummary(" 
        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce livre est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce livre. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce livre est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l'a inventé et pourquoi. Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing. 
        ");
        $livres[16]->setBookYear(2019);
        $livres[16]->setBookImage("./../assets/65.jpeg");
        $livres[16]->setBookUnitPrice(19.9);
        $livres[16]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[16]->setBookIsbn("9781706785606");
        $livres[16]->setBookFormat($formats[0]);
        $livres[16]->setBookEditor($editors[4]);
        $livres[16]->addBookAuthor($auteurs[4]);
        $livres[16]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[16]);

        $livres[17] = new Book();
        $livres[17]->setBookTitle("HTML5 & CSS3 - Créer un site web responsive");
        $livres[17]->setBookSummary(" 
        Dans ce livre vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5. Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.        ");
        $livres[17]->setBookYear(2020);
        $livres[17]->setBookImage("./../assets/66.jpeg");
        $livres[17]->setBookUnitPrice(19.99);
        $livres[17]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[17]->setBookIsbn("9788698662860");
        $livres[17]->setBookFormat($formats[0]);
        $livres[17]->setBookEditor($editors[4]);
        $livres[17]->addBookAuthor($auteurs[4]);
        $livres[17]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[17]);




        $livres[18] = new Book();
        $livres[18]->setBookTitle("Html 5 - une référence pour le développeur web");
        $livres[18]->setBookSummary("HTML 5 intègre dans sa conception l'architecture à trois piliers qu'est HTML pour la structure, CSS 3 pour l'apparence et JavaScript pour l'interactivité, avec de nombreuses nouvelles API pour concevoir des applications web. L'intégrateur ou le développeur web pourra ainsi découvrir et exploiter les standards du Web, pour proposer au sein de sites performants et accessibles des contenus multimédias (animations, audio et vidéo), mais également interactifs (nouveaux formulaires, glisser-déposer, etc.).
        Concevoir des sites riches, performants et accessibles avec HTML 5.
        Ce livre fait la lumière sur les spécifications ardues d'HTML 5, dont il explore l'ensemble des nouveautés et des balises, y compris celles ayant existé et évolué depuis les précédentes versions. Après avoir rappelé l'histoire mouvementée de sa conception au W3C et au WhatWG, l'auteur explique au fil des chapitres comment concevoir des sites et applications web performants et accessibles, en y incorporant des éléments médias (audio, vidéo), en créant des zones de dessin interactives et des animations avec Canvas et en exploitant les microformats pour un balisage sémantique qui améliorera l'échange de données et le référencement.
        Il détaille pas à pas les interfaces de programmation pour la gestion des fichiers (File API), la géolocalisation, la prise en charge du glisser-déposer (Drag & Drop), et explique comment stocker des données locales dans le navigateur (Web Storage), communiquer en temps réel ou procéder à des échanges interdocuments (Web Sockets, Server-Sent Events et Web Messaging). Il aborde enfin les techniques permettant d'exécuter du JavaScript en multithread (Web Workers) et la réalisation d'applications hors ligne, les bases de données côté navigateur (Indexed Database et Web SQL Database), ainsi que la manipulation avancée de l'historique (History API).
        Très illustrée, riche en conseils et bonnes pratiques, la troisième édition de cet ouvrage intègre toutes les dernières évolutions d'HTML 5 - depuis que sa première version a vu le jour-et les nouveautés concrètement implémentées par les navigateurs web. L'approche pragmatique permet de l'utiliser comme référence pour élaborer et modifier des pages web, mais aussi comme guide pour concevoir une application web.
        A qui cet ouvrage s'adresse-t-il ?
        - Aux développeurs web, intégrateurs qui souhaitent mettre en oeuvre les nouvelles API d'HTML 5 et moderniser leurs bonnes pratiques de développement web.
        - Aux designers web qui souhaitent découvrir toutes les possibilités que leur offre HTML 5.
        - À tous ceux qui souhaitent acquérir une méthodologie cohérente du développement web, combinant qualité et accessibilité.");
        $livres[18]->setBookYear(2017);
        $livres[18]->setBookImage("./../assets/67.jpeg");
        $livres[18]->setBookUnitPrice(39.00);
        $livres[18]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[18]->setBookIsbn("2212143656");
        $livres[18]->setBookFormat($formats[0]);
        $livres[18]->setBookEditor($editors[0]);
        $livres[18]->addBookAuthor($auteurs[0]);
        $livres[18]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[18]);

        $livres[19] = new Book();
        $livres[19]->setBookTitle("Apprendre à développer un site web avec PHP et MySQL");
        $livres[19]->setBookSummary("Ce livre s'adresse à un public de développeurs débutants connaissant déjà le HTML et les CSS et qui souhaitent bien comprendre le fonctionnement d'une application web pour créer leurs propres sites web dynamiques avec PHP et MySQL.
            Dans une première partie, le lecteur installera son environnement de développement WAMP puis découvrira les bases du langage PHP (en version 7 au moment de l'écriture), ses principales fonctions et structures de contrôle, ainsi que des explications sur la transmission des données entre les pages et sur la librairie graphique (les effets spéciaux sur une image). Ces apports théoriques sont accompagnés de nombreux exemples.
            Il en est de même dans la deuxième partie du livre, consacrée au langage SQL. Le lecteur découvrira ce qu'est une base de données MySQL et les différentes méthodes pour y accéder avec PHP (PDO, SQL Avancé) et comment assurer la sécurité de la base. Un chapitre est également consacré aux premiers pas sur la Programmation Orientée Objet et un autre à la gestion de la configuration et des performances.
            Pour que le lecteur puisse se forger une première expérience significative, l'auteur a préparé de nombreux exercices à la fin de chaque chapitre (exemples : comme créer un blog, une newsletter, un module de paiement en ligne PayPal...) et propose aussi leurs corrigés.
            ");
        $livres[19]->setBookYear(2018);
        $livres[19]->setBookImage("./../assets/68.jpeg");
        $livres[19]->setBookUnitPrice(29.90);
        $livres[19]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[19]->setBookIsbn("9782409015297");
        $livres[19]->setBookFormat($formats[0]);
        $livres[19]->setBookEditor($editors[1]);
        $livres[19]->addBookAuthor($auteurs[1]);
        $livres[19]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[19]);

        $livres[20] = new Book();
        $livres[20]->setBookTitle("CODER PROPREMENT");
        $livres[20]->setBookSummary(" 
        Si un code sale peut fonctionner, il peut également compromettre la pérennité d'une entreprise de développement de logiciels. Chaque année, du temps et des ressources sont gaspillés à cause d'un code mal écrit. Toutefois, ce n'est pas une fatalité.
Grâce à cet ouvrage, vous apprendrez à rédiger du bon code, ainsi qu'à le nettoyer « à la volée », et vous obtiendrez des applications plus robustes, plus évolutives et donc plus durables. Concret et pédagogique, ce manuel se base sur les bonnes pratiques d'une équipe de développeurs aguerris réunie autour de Robert C. Martin, expert logiciel reconnu. Il vous inculquera les valeurs d'un artisan du logiciel et fera de vous un meilleur programmeur.
Coder proprement est décomposé en trois parties. La première décrit les principes, les motifs et les pratiques employés dans l'écriture d'un code propre. La deuxième est constituée de plusieurs études de cas à la complexité croissante. Chacune d'elles est un exercice de nettoyage: vous partirez d'un exemple de code présentant certains problèmes, et l'auteur vous expliquera comment en obtenir une version saine et performante. La troisième partie, enfin, sera votre récompense. Son unique chapitre contient une liste d'indicateurs éprouvés par l'auteur qui vous seront précieux pour repérer efficacement les défauts de votre code.
            ");
        $livres[20]->setBookYear(2019);
        $livres[20]->setBookImage("./../assets/69.jpeg");
        $livres[20]->setBookUnitPrice(38);
        $livres[20]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[20]->setBookIsbn("9782326002272");
        $livres[20]->setBookFormat($formats[0]);
        $livres[20]->setBookEditor($editors[2]);
        $livres[20]->addBookAuthor($auteurs[2]);
        $livres[20]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[20]);


        $livres[21] = new Book();
        $livres[21]->setBookTitle("PHP et MySQL pour les Nuls");
        $livres[21]->setBookSummary(" 
        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.
        Ce livre vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...
                    ");
        $livres[21]->setBookYear(2019);
        $livres[21]->setBookImage("./../assets/70.jpeg");
        $livres[21]->setBookUnitPrice(12.5);
        $livres[21]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[21]->setBookIsbn("9782412043622");
        $livres[21]->setBookFormat($formats[1]);
        $livres[21]->setBookEditor($editors[3]);
        $livres[21]->addBookAuthor($auteurs[3]);
        $livres[21]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[21]);

        $livres[22] = new Book();
        $livres[22]->setBookTitle("Les bases du web : Html5, Css3, JavaScript");
        $livres[22]->setBookSummary(" 
        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce livre est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce livre. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce livre est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l'a inventé et pourquoi. Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing. 
        ");
        $livres[22]->setBookYear(2019);
        $livres[22]->setBookImage("./../assets/71.jpeg");
        $livres[22]->setBookUnitPrice(19.9);
        $livres[22]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[22]->setBookIsbn("9781706785606");
        $livres[22]->setBookFormat($formats[0]);
        $livres[22]->setBookEditor($editors[4]);
        $livres[22]->addBookAuthor($auteurs[4]);
        $livres[22]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[22]);

        $livres[23] = new Book();
        $livres[23]->setBookTitle("HTML5 & CSS3 - Créer un site web responsive");
        $livres[23]->setBookSummary(" 
        Dans ce livre vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5. Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.        ");
        $livres[23]->setBookYear(2020);
        $livres[23]->setBookImage("./../assets/72.jpeg");
        $livres[23]->setBookUnitPrice(19.99);
        $livres[23]->setBookStock($faker->numberBetween($min = 10, $max = 50));
        $livres[23]->setBookIsbn("9788698662860");
        $livres[23]->setBookFormat($formats[0]);
        $livres[23]->setBookEditor($editors[4]);
        $livres[23]->addBookAuthor($auteurs[4]);
        $livres[23]->setBookVisitNumber($faker->numberBetween($min = 0, $max = 30));

        $manager->persist($livres[23]);



        $manager->flush();
    }
}
