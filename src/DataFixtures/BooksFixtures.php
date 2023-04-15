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
        $book1->setImage("https://www.thibaultmorizet.fr/assets/product-images/16.jpeg");
        $book1->setUnitpriceht(36.97);
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
        $book2->setImage("https://www.thibaultmorizet.fr/assets/product-images/17.jpeg");
        $book2->setUnitpriceht(28.34);
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
        $book3->setImage("https://www.thibaultmorizet.fr/assets/product-images/18.jpeg");
        $book3->setUnitpriceht(36.02);
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
        $book4->setImage("https://www.thibaultmorizet.fr/assets/product-images/19.jpeg");
        $book4->setUnitpriceht(32.23);
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
        $book5->setImage("https://www.thibaultmorizet.fr/assets/product-images/20.jpeg");
        $book5->setUnitpriceht(18.85);
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
        $book6->setImage("https://www.thibaultmorizet.fr/assets/product-images/21.jpeg");
        $book6->setUnitpriceht(18.95);
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
        $book7->setImage("https://www.thibaultmorizet.fr/assets/product-images/22.jpeg");
        $book7->setUnitpriceht(28.34);
        $book7->setStock($faker->numberBetween(min: 50, max: 600));
        $book7->setTaxe($this->getReference('taxe1'));
        $book7->setVisitnumber($faker->numberBetween(max: 500));
        $book7->setSoldnumber($faker->numberBetween(max: $book7->getVisitnumber()));
        $book7->setIsbn("978-2-409-03517-3");
        $book7->setFormat($this->getReference('format1'));
        $book7->setEditor($this->getReference('editor2'));
        $book7->addAuthor($this->getReference('author6'));
        $book7->addCategory($this->getReference('category2'));
        $manager->persist($book7);
        $this->addReference('book7', $book7);

        $book8 = new Book();
        $book8->setTitle("Les réseaux informatiques - Guide pratique pour l'administration");
        $book8->setSummary("
        Ce livre sur les réseaux informatiques s'adresse aussi bien aux administrateurs réseau, techniciens ou ingénieurs en charge de la conception, de l'administration, de la sécurité et de la mise en place de solutions de supervision d'un réseau, qu'aux étudiants souhaitant disposer de connaissances théoriques et techniques nécessaires pour exercer le métier d'administrateur réseau au sens large. 

        En s'appuyant sur les standards définis par l'IEEE ou l'IETF, l'auteur propose au lecteur un guide opérationnel alliant toute la théorie nécessaire sur les concepts étudiés illustrée à l'aide de nombreux schémas à des cas concrets de mise en pratique teintés de toute la réalité technique du terrain. 

        Pour mieux poser le contexte dans lequel s'inscrit le métier d'administrateur réseau, le premier chapitre du livre est consacré à un historique de l'évolution des réseaux informatiques. Dans les chapitres qui suivent, l'auteur présente les techniques de conception d'un réseau local ainsi que la gestion des routeurs, des commutateurs et des différents équipements déployés en matière de configuration, d'inventaire et de sauvegarde. 

        L'auteur fait ensuite le point sur les différentes méthodes pour mettre en place de la redondance et de la haute disponibilité. Le lecteur sera ainsi en mesure de solutionner plus sereinement des problèmes d'interruption de services. La problématique de la sécurité du réseau étant également incontournable, deux chapitres lui sont dédiés avec, pour le premier, une orientation plus précise sur la gestion des accès au réseau LAN au travers de pare-feux. Dans le second, l’auteur propose de vous mettre dans la peau d’un pirate afin d’expliquer par des exemples concrets les différentes phases d’une attaque informatique, dont les méthodes d’intrusion illustrées à l’aide des outils très utilisés dans le monde de la cybersécurité comme NMAP et Metasploit. 

        Les moyens d'observation de la santé du réseau sont également détaillés à travers les outils de supervision et les techniques de métrologie. L'auteur décrit ainsi les protocoles et les méthodes qui entrent en jeu et qui permettent d'extraire des indicateurs concrets pour mesurer les performances d'un réseau et des applications. 

        Pour finir, un chapitre présente concrètement les concepts relativement nouveaux de virtualisation réseau, de SDN ( Software Defined Network ) et de SD-WAN, notamment dans le cadre d'architectures réseau au sein de datacenters ou dans le Cloud. 
        ");
        $book8->setYear(2023);
        $book8->setImage("https://www.thibaultmorizet.fr/assets/product-images/23.jpeg");
        $book8->setUnitpriceht(36.97);
        $book8->setStock($faker->numberBetween(min: 50, max: 600));
        $book8->setTaxe($this->getReference('taxe1'));
        $book8->setVisitnumber($faker->numberBetween(max: 500));
        $book8->setSoldnumber($faker->numberBetween(max: $book8->getVisitnumber()));
        $book8->setIsbn("978-2-409-03838-9");
        $book8->setFormat($this->getReference('format1'));
        $book8->setEditor($this->getReference('editor2'));
        $book8->addAuthor($this->getReference('author7'));
        $book8->addCategory($this->getReference('category2'));
        $manager->persist($book8);
        $this->addReference('book8', $book8);

        $book9 = new Book();
        $book9->setTitle("Git - Maîtrisez la gestion de vos versions");
        $book9->setSummary("
        Ce livre s’adresse principalement aux développeurs et aux chefs de projet mais également aux professionnels appelés à modifier des codes sources (graphiste, webdesigner, etc.). 

        Le livre présente tout d’abord l’historique des solutions de gestion de versions et leur intérêt. Il permet ensuite au lecteur d’installer et de configurer Git puis de l’utiliser tout au long de cinq chapitres progressifs (fonctionnement des branches, partage d’un dépôt, outils internes...). Un chapitre permet au lecteur de bien appréhender git-flow, une méthode pour gérer efficacement les différentes versions d’un projet en entreprise. 

        Deux chapitres présentent la gestion de versions de manière très pragmatique en utilisant deux scénarios mettant en oeuvre des développeurs. Le premier scénario reprend les bases de l’utilisation de Git et montre l’utilisation des principales commandes dans des cas quasi-réels. Le deuxième scénario met en scène une équipe de développeurs : de l’installation de Git- Lab, jusqu’à une utilisation de la méthode git-flow par l’équipe. Ce chapitre détaille les principales étapes par lesquelles l’équipe doit passer pour versionner un projet existant. 

        Un chapitre présente une liste d’alias et de commandes prêtes à l’emploi, fruit d’années de pratique de Git de l’auteur, afin que le lecteur utilise Git plus efficacement et puisse obtenir des solutions de problèmes communs. Le dernier chapitre présente un cas réel d’intégration continue 100% Git dans le cadre d’un développement web avec le framework Django. 

        En annexe, un aide-mémoire permet de visualiser rapidement les principales commandes et leurs principales options. Une présentation de la plateforme GitHub et des changements qu’elle apporte dans la collaboration entre développeurs est également proposée par l’auteur.
        ");
        $book9->setYear(2023);
        $book9->setImage("https://www.thibaultmorizet.fr/assets/product-images/24.jpeg");
        $book9->setUnitpriceht(36.97);
        $book9->setStock($faker->numberBetween(min: 50, max: 600));
        $book9->setTaxe($this->getReference('taxe1'));
        $book9->setVisitnumber($faker->numberBetween(max: 500));
        $book9->setSoldnumber($faker->numberBetween(max: $book9->getVisitnumber()));
        $book9->setIsbn("978-2-409-03838-9");
        $book9->setFormat($this->getReference('format1'));
        $book9->setEditor($this->getReference('editor2'));
        $book9->addAuthor($this->getReference('author8'));
        $book9->addCategory($this->getReference('category4'));
        $manager->persist($book9);
        $this->addReference('book9', $book9);

        $book10 = new Book();
        $book10->setTitle("Git par la pratique");
        $book10->setSummary("
        Grâce à son modèle de gestion de versions, Git est devenu un puissant outil de collaboration, indispensable dans tous les types de projets informatiques. Prenez les rênes de Git sous la houlette de David Demaree, qui fait la lumière sur le déroulement du processus en ligne de commande, les subtilités des repositories et des branches, les ingrédients d'un message de commit pertinent et bien d'autres aspects... Avec lui, vous découvrirez les tâches courantes du suivi de version et des conseils avisés pour les scénarios plus complexes. Avec ce petit guide pratique, vous avez entre les mains un outil précieux pour faire de Git votre allié et celui de toute votre équipe.        ");
        $book10->setYear(2017);
        $book10->setImage("https://www.thibaultmorizet.fr/assets/product-images/25.jpeg");
        $book10->setUnitpriceht(14.22);
        $book10->setStock($faker->numberBetween(min: 50, max: 600));
        $book10->setTaxe($this->getReference('taxe1'));
        $book10->setVisitnumber($faker->numberBetween(max: 500));
        $book10->setSoldnumber($faker->numberBetween(max: $book10->getVisitnumber()));
        $book10->setIsbn("978-2-212-67441-5");
        $book10->setFormat($this->getReference('format1'));
        $book10->setEditor($this->getReference('editor1'));
        $book10->addAuthor($this->getReference('author10'));
        $book10->addCategory($this->getReference('category4'));
        $manager->persist($book10);
        $this->addReference('book10', $book10);

        $book11 = new Book();
        $book11->setTitle("Concevez votre site web avec PHP et MySQL");
        $book11->setSummary("
        Vous connaissez le HTML et vous avez toujours rêvé de créer un site web dynamique, avec votre propre blog, vos forums et votre espace membres ? Ne cherchez plus ! Découvrez dans cet ouvrage dédié aux débutants comment utiliser les outils les plus célèbres du web dynamique : PHP et MySQL !
      
        Qu'allez-vous apprendre ?
        Les bases de PHP
        Les variables et conditions
        Les boucles, tableaux et fonctions
        Au secours ! Mon script plante !
        Inclure des portions de page
 
        Transmettre des données de page en page
        Transmettre des données avec l'URL et les formulaires
        Protéger une page par mot de passe
        Variables superglobales
        Sessions et cookies
 
        Stocker des informations dans une base de données
        phpMyAdmin
        Lire et écrire des données
        Les fonctions SQL
        Les jointures entre tables
        ");
        $book11->setYear(2022);
        $book11->setImage("https://www.thibaultmorizet.fr/assets/product-images/26.jpeg");
        $book11->setUnitpriceht(27.49);
        $book11->setStock($faker->numberBetween(min: 50, max: 600));
        $book11->setTaxe($this->getReference('taxe1'));
        $book11->setVisitnumber($faker->numberBetween(max: 500));
        $book11->setSoldnumber($faker->numberBetween(max: $book11->getVisitnumber()));
        $book11->setIsbn("978-2-416-00885-6");
        $book11->setFormat($this->getReference('format1'));
        $book11->setEditor($this->getReference('editor1'));
        $book11->addAuthor($this->getReference('author11'));
        $book11->addCategory($this->getReference('category3'));
        $manager->persist($book11);
        $this->addReference('book11', $book11);

        $book12 = new Book();
        $book12->setTitle("L'intelligence artificielle en pratique avec Python");
        $book12->setSummary("
        Un livre à la fois théorique et pratique
        
        Cet ouvrage à vocation pédagogique a pour but d'aider les débutants et même les praticiens confirmés de l'intelligence artificielle à mieux faire le tri entre certains mécanismes algorithmiques propres à cette discipline et souvent confondus dont les trois fondamentaux : « la recherche », « l'optimisation » et « l'apprentissage ». Même si le Web regorge de solutions algorithmiques et de codes clés en main mis à disposition des internautes, ces codes constituent rarement la bonne solution pour faire face à un problème. En effet, il faut souvent prendre du recul, et c'est précisément ce que propose cet ouvrage, pour pouvoir trancher entre les différentes offres algorithmiques (les trois fondamentaux) et choisir celle qui sera la plus appropriée au cas de figure que l'on rencontre. Dix problèmes très classiques de l'univers algorithmique et de l'IA sont abordés dans la 2e édition ce livre. Pour chacun, nous allons détailler l'une ou l'autre méthode issue d'un des trois mécanismes fondamentaux (recherche, optimisation ou apprentissage) :
        
        le jeu du taquin ;
        l'algorithme du plus court chemin (celui qu'on trouve dans les GPS) ;
        le jeu du sudoku ;
        le jeu de Puissance 4 à deux joueurs ;
        le jeu du Tetris ; (Mis à jour)
        le jeu du Snake ;
        la séparation des spams et des non-spams ;
        les règles d'accès au crédit ; (Nouveau)
        les aides au tri de la presse ou des avis de clients ; (Nouveau)
        la reconnaissance sur photo de chiens ou de chats.
        
        À qui s'adresse cet ouvrage ?
        Aux étudiants, en informatique ou pas, qui découvrent l'IA dans leur parcours académique
        Aux informaticiens, même les plus confirmés, qui se sentent de plus en plus décontenancés devant l'offre pléthorique des recettes d'IA dont ils n'arrivent pas toujours à comprendre « qui fait quoi »
        ");
        $book12->setYear(2023);
        $book12->setImage("https://www.thibaultmorizet.fr/assets/product-images/27.jpeg");
        $book12->setUnitpriceht(30.33);
        $book12->setStock($faker->numberBetween(min: 50, max: 600));
        $book12->setTaxe($this->getReference('taxe1'));
        $book12->setVisitnumber($faker->numberBetween(max: 500));
        $book12->setSoldnumber($faker->numberBetween(max: $book12->getVisitnumber()));
        $book12->setIsbn("978-2-416-01094-1");
        $book12->setFormat($this->getReference('format2'));
        $book12->setEditor($this->getReference('editor1'));
        $book12->addAuthor($this->getReference('author12'));
        $book12->addAuthor($this->getReference('author13'));
        $book12->addCategory($this->getReference('category5'));
        $manager->persist($book12);
        $this->addReference('book12', $book12);

        $book13 = new Book();
        $book13->setTitle("70 concepts mathématiques expliqués avec Python");
        $book13->setSummary("
        Largement inspiré des travaux de Seymour Papert (mathématicien et pionnier des technologies éducatives, ancien professeur au MIT), l'objectif de cet ouvrage est de démystifier les grandes idées mathématiques en dotant les lecteurs du meilleur outil pour les comprendre et jouer avec : la programmation.
        Chaque concept ou idée mathématique est traité sous la forme d'une double page mettant en vis-à-vis la présentation du concept étayée d'éléments de contexte historiques et épistémologiques, et son illustration à l'aide de codes Python.
        Les codes sources sont tous accessibles et manipulables en ligne via la page de présentation de l'ouvrage sur le site dunod.com.
        ");
        $book13->setYear(2023);
        $book13->setImage("https://www.thibaultmorizet.fr/assets/product-images/28.jpeg");
        $book13->setUnitpriceht(21.8);
        $book13->setStock($faker->numberBetween(min: 50, max: 600));
        $book13->setTaxe($this->getReference('taxe1'));
        $book13->setVisitnumber($faker->numberBetween(max: 500));
        $book13->setSoldnumber($faker->numberBetween(max: $book13->getVisitnumber()));
        $book13->setIsbn("978-2100836130");
        $book13->setFormat($this->getReference('format2'));
        $book13->setEditor($this->getReference('editor6'));
        $book13->addAuthor($this->getReference('author14'));
        $book13->addCategory($this->getReference('category5'));
        $manager->persist($book13);
        $this->addReference('book13', $book13);

        $book14 = new Book();
        $book14->setTitle("Tout JavaScript");
        $book14->setSummary("
        Ce livre s'adresse à tous les développeurs web, qu'ils soient débutants ou avancés.
        Le JavaScript sert avant tout à rendre les pages web interactives et dynamiques du côté de l'utilisateur, mais il est également de plus en plus utilisé pour créer des applications complètes, y compris côté serveur.La première partie de ce livre couvre l'ensemble des fonctionnalités du JavaScript (version ECMAScript 6 jusque ES2020) et passe en revue les bonnes pratiques de programmation.
        La deuxième partie porte sur l'interactivité avec les utilisateurs (interfaces, formulaires, gestion des erreurs, appels asynchrones, géolocalisation, notifications, dessin...).
        La troisième partie permet de s'initier aux aspects les plus avancés du JavaScript tels que Node.js, React, Vue.js, jQuery ou les Web Workers.
        Une première annexe guide le développeur web dans l'installation en local de son environnement de travail complet avec serveur web, PHP et base de données, grâce à Docker. Une deuxième introduit l'usage du JavaScript dans l'environnement cloud Google Sheets, et une dernière concerne CSS.
        Les renvois de type tjs.ovh/nomScript qui sont présents au fil des pages sont des compléments interactifs à ce livre. Ils affichent :
        Le rendu de l'exécution du script.
        Un émulateur de la console du navigateur.
        Le code source complet de l'exemple avec une coloration syntaxique, des commentaires et des liens vers les fiches de la référence JS du site toutjavascript.com.
        ");
        $book14->setYear(2023);
        $book14->setImage("https://www.thibaultmorizet.fr/assets/product-images/29.jpeg");
        $book14->setUnitpriceht(28.34);
        $book14->setStock($faker->numberBetween(min: 50, max: 600));
        $book14->setTaxe($this->getReference('taxe1'));
        $book14->setVisitnumber($faker->numberBetween(max: 500));
        $book14->setSoldnumber($faker->numberBetween(max: $book14->getVisitnumber()));
        $book14->setIsbn("978-2100846276");
        $book14->setFormat($this->getReference('format2'));
        $book14->setEditor($this->getReference('editor6'));
        $book14->addAuthor($this->getReference('author15'));
        $book14->addCategory($this->getReference('category1'));
        $book14->addCategory($this->getReference('category6'));
        $manager->persist($book14);
        $this->addReference('book14', $book14);

        $book15 = new Book();
        $book15->setTitle("Oh my code, je parle le JavaScript !");
        $book15->setSummary("
        Mettez-vous au javascript à travers 14 projets !
        Vous souhaitez apprendre à coder en JavaScript, le langage qui rendra vos pages web interactives et dynamiques ? C'est justement l'objet de cet ouvrage qui vous guidera pas à pas dans la création de 14 projets concrets que vous pourrez intégrer à n'importe quel site Internet. Vous y découvrirez aussi la méthodologie à suivre pour décomposer votre code en microétapes et anticiper son écriture. En outre, de nombreuses cartes mentales vous accompagneront tout au long de votre lecture pour visualiser les bons outils JavaScript à utiliser. Enfin, sur le site compagnon de l'ouvrage, vous trouverez les fichiers sources des 14 projets ainsi qu'un forum pour échanger, poser des questions et suivre l'actualité JavaScript.

        Vous apprendrez notamment à :
        utiliser la méthode des 3S pour structurer vos programmes
        récupérer les données de vos visiteurs
        utiliser des API (Application Programming Interface)
        et bien plus encore...

        À qui s'adresse ce livre ?
        Aux débutantes et débutants en JavaScript
        Aux développeuses et développeurs web        
        ");
        $book15->setYear(2021);
        $book15->setImage("https://www.thibaultmorizet.fr/assets/product-images/30.jpeg");
        $book15->setUnitpriceht(20.85);
        $book15->setStock($faker->numberBetween(min: 50, max: 600));
        $book15->setTaxe($this->getReference('taxe1'));
        $book15->setVisitnumber($faker->numberBetween(max: 500));
        $book15->setSoldnumber($faker->numberBetween(max: $book15->getVisitnumber()));
        $book15->setIsbn("978-2-416-00461-2");
        $book15->setFormat($this->getReference('format2'));
        $book15->setEditor($this->getReference('editor1'));
        $book15->addAuthor($this->getReference('author16'));
        $book15->addCategory($this->getReference('category1'));
        $book15->addCategory($this->getReference('category6'));
        $manager->persist($book15);
        $this->addReference('book15', $book15);

        $manager->flush();
    }
}
