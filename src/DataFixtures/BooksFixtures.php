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
        $book3->addAuthor($this->getReference('author3'));
        $book3->addCategory($this->getReference('category1'));
        $manager->persist($book3);
        $this->addReference('book3', $book3);

        $book4 = new Book();
        $book4->setTitle("PHP et MySQL pour les Nuls");
        $book4->setSummary("
        Le livre best-seller sur PHP & MySQL !

        Avec cette 6e édition de PHP et MySQL pour les Nuls version poche, vous verrez qu'il n'est plus nécessaire d'être un as de la programmation pour développer des sites Web dynamiques et interactifs.

        Ce livre vous introduira aux toutes dernières évolutions des deux langages. Vous apprendrez à manipuler tous les outils de gestion de sessions, les cookies, gérer le code XML et JavaScript, mettre en place des systèmes de sécurité, et bien d'autres choses encore...        ");
        $book4->setYear(2019);
        $book4->setImage("https://www.thibaultmorizet.fr/assets/product-images/5.jpeg");
        $book4->setUnitpriceht(23.15);
        $book4->setStock($faker->numberBetween(min: 50, max: 600));
        $book4->setTaxe($this->getReference('taxe1'));
        $book4->setVisitnumber($faker->numberBetween(max: 500));
        $book4->setSoldnumber($faker->numberBetween(max: $book4->getVisitnumber()));
        $book4->setIsbn("978-2412043622");
        $book4->setFormat($this->getReference('format2'));
        $book4->setEditor($this->getReference('editor4'));
        $book4->addAuthor($this->getReference('author4'));
        $book4->addCategory($this->getReference('category3'));
        $manager->persist($book4);
        $this->addReference('book4', $book4);

        $book5 = new Book();
        $book5->setTitle("Les bases du web : Html5, Css3, JavaScript");
        $book5->setSummary("
        Le web est un domaine en constante évolution. Les technologies évoluent et le web également. Créer un site web ou une application est beaucoup plus facile aujourd'hui qu'hier ! Malgré toutes ces avancées, le web reste un domaine très technique, qui n'est pas facile à appréhender. Le but de ce livre est de vous inculquer les bases du web et de vous permettre de maîtriser les bases du HTML, du CSS et du JavaScript. Vous n'avez pas besoin d'être un \"geek\" pour comprendre ce livre. Vous devez simplement être intéressé par le sujet et avoir la volonté d'élargir votre savoir ! Si votre but est de devenir développeur web et que vous débutez dans ce domaine, ce livre est fait pour vous. Si vous êtes intéressé par le sujet, dans le but de créer un site ou une application web, cette lecture est également appropriée. Dans le chapitre \"Qu\'est-ce que le web ?\", vous apprendrez comment le web est né en 1989, qui l\'a inventé et pourquoi . Vous apprendrez à maîtriser des concepts tels que Http, Html, les navigateurs web, les cookies ou encore le Cloud Computing . Dans le chapitre \"Les langages du web\", vous apprendrez à distinguer un langage client d\'un langage serveur, ce qu\'est une base de données et comment y stocker des informations, ce qu\'est une API. Dans le chapitre \"Types de site et d\'applications web\", vous étudierez les sites web Responsive, les applications mobiles et les applications web progressives (Progressive Web Apps). Vous serez alors en mesure de faire un choix entre ces types de sites et d\'applications web pour votre propre projet.Dans le chapitre \"Médias Web\", vous étudierez quels médias utiliser sur le web, comment les utiliser et comment trouver des images, vidéos et icônes adaptés à votre projet. Dans le chapitre \"Bases de réseau pour le développement web\", vous étudierez le modèle OSI, comment fonctionne le réseau Internet, comment acheter un nom de domaine et héberger un site web ou une application.Dans le chapitre \"Introduction au HTML5\", vous apprendrez tous les fondamentaux du HTML5, dans le but de construire le squelette d\'un site web.Dans le chapitre \"Introduction à CSS3\", vous apprendrez à créer des feuilles de style pour votre site web.Dans le chapitre \"Introduction à JavaScript\", vous apprendrez à insérer du code JavaScript dans votre site. JavaScript est un langage de script, permettant d\'ajouter des animations et de l\'interactivité à vos pages web.Dans le chapitre \"Comprendre les moteurs de recherche\", vous apprendrez comment fonctionnent les moteurs de recherche et comment référencer un site ou une application web sur les moteurs de recherche les plus utilisés que sont Google, Bing et Yahoo. Vous apprendrez les bases du référencement web, également connu sous le nom de SEO (Search Engine Optimization).Dans le dernier chapitre, \"Comment devenir développeur web ? \", une présentation des principaux métiers du web vous sera faite. Nous vous présenterons les écoles et les formations sur Internet pour devenir développeur web ou élargir vos connaissances sur le sujet. Je vous donnerai également des trucs et astuces pour ne pas tomber dans les pièges des débutants. Concernant les chapitres techniques, des exercices vous seront proposés avec leurs corrections. Ces exercices ont pour but de vous entraîner à créer un site web. Je vous conseille vivement de les faire.Ce livre est protégé et déposé à l\'INPI. Toute reproduction est interdite. 
        ");
        $book5->setYear(2019);
        $book5->setImage("https://www.thibaultmorizet.fr/assets/product-images/6.jpeg");
        $book5->setUnitpriceht(18.81);
        $book5->setStock($faker->numberBetween(min: 50, max: 600));
        $book5->setTaxe($this->getReference('taxe1'));
        $book5->setVisitnumber($faker->numberBetween(max: 500));
        $book5->setSoldnumber($faker->numberBetween(max: $book5->getVisitnumber()));
        $book5->setIsbn("978-1706785606");
        $book5->setFormat($this->getReference('format1'));
        $book5->setEditor($this->getReference('editor5'));
        $book5->addAuthor($this->getReference('author5'));
        $book5->addCategory($this->getReference('category1'));
        $manager->persist($book5);
        $this->addReference('book5', $book5);

        $book6 = new Book();
        $book6->setTitle("HTML5 & CSS3 - Créer un site web responsive");
        $book6->setSummary("
        Dans ce livre vous apprendrez à créer un site web responsive statique en utilisant HTML5 et CSS3.Dans le chapitre \"Les bases de HTML5\", vous apprendrez à utiliser un éditeur de texte, à coder votre première page web et à utiliser les principales balises HTML5.Dans le chapitre \"Les médias HTML5\", vous apprendrez à insérer des médias dans vos pages HTML : documents, images, vidéos, fichiers audios, plug-ins, vidéos YouTube, éléments de dessin SVG. Des ressources intéressantes vous seront fournies pour trouver des médias facilement sur le web pour votre site ou application.Dans le chapitre \"Les formulaires HTML5\", vous apprendrez à créer des formulaires avec HTML5.Dans le chapitre \"Les APIs HTML5\", vous apprendrez à utiliser les principales APIs HTML5 : les canvas, la géolocalisation, le Drag and Drop, le Web Storage, les Web Workers et le concept d'IndexedDB.Dans le chapitre \"Les microdonnées HTML5\", vous apprendrez à implémenter des microdonnées à l'intérieur d'une page HTML. Le but sera de donner du sens à certaines parties de votre site web, pour qu'il soit mieux indexé par les moteurs de recherche.Dans le chapitre \"Les bases de CSS3\", vous apprendrez les bases du CSS3 : comment créer une feuille de style, la syntaxe de base et les unités utilisées.Dans le chapitre \"CSS3 Avancé\", vous apprendrez des notions plus avancées de CSS3 : créer des coins arrondis, des dégradés, des ombres, des effets de texte, intégrer des polices de caractère à son site et utiliser les Flex Box.Dans le dernier chapitre \"Design Web Responsive avec CSS3\", vous apprendrez à créer un site web responsive avec CSS3. Nous verrons les notions de viewport, de grille, les media queries, les images et les vidéos responsive etc.A la fin de ce livre, vous serez en mesure de créer un site web responsive entièrement codé en HTML5 et CSS3. Vous serez parfaitement autonome dans cette tâche. Le livre est ponctué d'exercices dont le but principal est de créer un site web responsive pas à pas. La correction globale se trouve en annexe. Vous pouvez également télécharger le dossier d'exercices et la correction sur notre compte GitHub : https://github.com/webstreet-cie/html5-css3-create-responsive-website.NB : Le livre est traduit en français, mais le projet est entièrement en anglais. Ce livre est protégé auprès de l'INPI. Toute reproduction est totalement interdite et vous vous exposez à des poursuites dans le cas contraire.        ");
        $book6->setYear(2020);
        $book6->setImage("https://www.thibaultmorizet.fr/assets/product-images/7.jpeg");
        $book6->setUnitpriceht(18.90);
        $book6->setStock($faker->numberBetween(min: 50, max: 600));
        $book6->setTaxe($this->getReference('taxe1'));
        $book6->setVisitnumber($faker->numberBetween(max: 500));
        $book6->setSoldnumber($faker->numberBetween(max: $book6->getVisitnumber()));
        $book6->setIsbn("979-8698662860");
        $book6->setFormat($this->getReference('format1'));
        $book6->setEditor($this->getReference('editor5'));
        $book6->addAuthor($this->getReference('author5'));
        $book6->addCategory($this->getReference('category1'));
        $manager->persist($book6);
        $this->addReference('book6', $book6);

        $book7 = new Book();
        $book7->setTitle("Réseaux informatiques - Notions fondamentales (9e édition)");
        $book7->setSummary("
        Ce livre sur les réseaux s'adresse aussi bien aux personnes désireuses de comprendre les réseaux informatiques et les systèmes d'exploitation, qu'aux informaticiens plus expérimentés souhaitant renforcer et mettre à jour leurs connaissances. 

        Le lecteur identifie les contextes d'accès aux réseaux d'aujourd'hui grâce notamment à des illustrations détaillant clairement les composants et technologies mis en jeu. De nombreux exemples reposant sur une approche client/serveur lui permettent de passer en revue les systèmes d'exploitation les plus courants, ainsi que les matériels associés. La tolérance de panne et le stockage sont également détaillés avec les différentes typologies de disque ainsi que les notions telles que NAS, SAN, zoning, Fibre Channel, FCoE ou encore iSCSI. Les protocoles de réplication entre baies sont également décrits ainsi que le fonctionnement de la déduplication pour les sauvegardes et le principe des WAAS. Une synthèse sur la virtualisation est proposée permettant au lecteur de bien comprendre les enjeux, les avantages et inconvénients apportés par les différentes solutions du marché. 

        Avec une approche pragmatique, l'auteur permet ensuite au lecteur de mieux comprendre le modèle OSI en couches réseau de référence. Puis, de manière exhaustive, les principes de base sont présentés (normes, architectures courantes, câblages, codage des données, topologie, réseaux sans fil, interconnexions de réseaux, boucle locale optique de la fibre...) puis les différents protocoles qui comptent dans les réseaux informatiques (PXE, WOL, Ethernet, Wi-Fi, Bluetooth, ADSL, WiMax, téléphonie 2G à 5G…) sont déclinés d'un point de vue opérationnel sans noyer le lecteur dans un discours trop théorique. Une partie sur les orbites basses permet de donner une visibilité sur les solutions en cours et les projets à venir. Un panorama des objets connectés IoT est également proposé. 

        Les couches basses sont décrites de façon détaillée en proposant de nombreuses illustrations sur la connectique et les matériels utilisés (codage, signaux, connectique coaxiale, cuivre, fibre). La configuration réseau est examinée pour Windows, Linux, macOS, iOS et Android. Les méthodes d'accès au support CSMA/CA, CSMA/CD ainsi que le jeton passant sont expliqués. D'un point de vue réseau, les équipements agissant au niveau des différentes couches OSI sont examinés : répéteur, pont, routeur, passerelle. L'algorithme du Spanning Tree ainsi que le fonctionnement des VLANs sont expliqués au travers d'exemples détaillés. Le fonctionnement de VSS et les protocoles liés au routage (RIP, OSPF, BGP, HSRP) sont passés en revue. Des exemples de configuration sont proposés au travers de Packet Tracer et les technologies FDDI, ATM, SONET et autres relais de trames sont également étudiés. 

        Les protocoles TCP/IP sont présentés en détail, en particulier la décomposition en sous-réseaux en IPv4, ainsi qu'une approche complète de l'adressage IPv6 (dont la voix sur IP). Les services réseau tels que DHCP, DNS, NTP ou SNMP sont également décrits. Le principe des méthodes d'authentification NTLM et Kerberos est abordé. Un chapitre traite des principes de base de la sécurité face aux menaces qui pèsent sur un réseau en proposant de nombreux liens vers des sites gratuits d'investigation. 

        En annexe est fournie une liste des acronymes les plus significatifs dans le monde des réseaux informatiques. 
        ");
        $book7->setYear(2022);
        $book7->setImage("https://www.thibaultmorizet.fr/assets/product-images/8.jpeg");
        $book7->setUnitpriceht(28.26);
        $book7->setStock($faker->numberBetween(min: 50, max: 600));
        $book7->setTaxe($this->getReference('taxe1'));
        $book7->setVisitnumber($faker->numberBetween(max: 500));
        $book7->setSoldnumber($faker->numberBetween(max: $book7->getVisitnumber()));
        $book7->setIsbn("978-2-409-03517-3");
        $book7->setFormat($this->getReference('format1'));
        $book7->setEditor($this->getReference('editor2'));
        $book7->addAuthor($this->getReference('author6'));
        $book7->addCategory($this->getReference('category1'));
        $manager->persist($book7);
        $this->addReference('book7', $book7);

        $manager->flush();
    }
}
