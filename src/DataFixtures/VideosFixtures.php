<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class VideosFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [
            BrandsFixtures::class,
            AuthorsFixtures::class,
            CategoriesFixtures::class,
            TaxesFixtures::class
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $video1 = new Video();
        $video1->setTitle("Apprendre le Référencement Naturel - Formation SEO");
        $video1->setBrand($this->getReference('marque1'));
        $video1->setSummary("Formation SEO de l'éditeur Elephorm, présentée par Olivier Andrieu, élu meilleur référenceur naturel de France. Avec cette formation vous allez acquérir toutes les notions fondamentales pour optimiser la présence de votre site Web sur les moteurs de recherche.");
        $video1->setYear(2014);
        $video1->setImage("https://www.thibaultmorizet.fr/assets/product-images/1.jpeg");
        $video1->setUnitpriceht(65.40);
        $video1->setStock($faker->numberBetween(min: 50, max: 600));
        $video1->addAuthor($this->getReference('author9'));
        $video1->addCategory($this->getReference('category7'));
        $video1->setTaxe($this->getReference('taxe1'));
        $video1->setVisitnumber($faker->numberBetween(max: 500));
        $video1->setSoldnumber($faker->numberBetween(max: $video1->getVisitnumber()));
        $manager->persist($video1);
        $this->addReference('video1', $video1);

        $video2 = new Video();
        $video2->setTitle("MySQL pour les débutants: Formation MySQL de A à Z");
        $video2->setBrand($this->getReference('marque2'));
        $video2->setSummary("
        MySQL est un systême très rapide et compact, vous pouvez donc l'exécuter avec vos autres applications sur un ordinateur portable ou de bureau. Dans ce cours, vous serez guidé à travers les bases de SQL et introduit à aux bases de données MySQL, et à la fin du cours, vous aurez une réelle capacité à créer et à superviser vos bases de données.

        Ce cours vous montrera en outre comment installer le logiciel MySQL et effectuer la configuration de base. Vous apprendrez également les requêtes de base en SQL et MySQL.

        Au long de ce cours, vous comprendrez que savoir comment fonctionnent les bases de données est un avantage considérable dans n’importe quel cheminement de carrière que vous avez choisi; que vous soyez intéressé par le marketing, la gestion de compte, la programmation ou la recherche et d'autres innombrables domaines d'études.
        
        Votre capacité à tirer parti d'une base de données à votre avantage est un outil incroyablement puissant à manier. Suivre ce cours vous rendra plus utile et pertinent pour les employeurs qui auront besoin de votre maîtrise de MySQL pour répondre à leurs besoins axés sur les données.
        
        Pourquoi choisir ce cours?
        
        Le cours vous aidera à assurer votre confiance dans la gestion de base de données MySQL en vous montrant comment optimiser les performances et les requêtes pour votre base de données. Ce cours améliorera vos compétences car il a une bonne applicabilité dans le monde de la technologie, ce qui peut différencier votre travail de la concurrence.
        
        Les progrès rapides dans le monde de la technologie peuvent également être decourageant pour quiconque souhaitant entrer dans le domaine de la technologie des bases de données, mais ce cours, vous fournissant instructions et explications étape par étape, sera un garde et une lumière au bout du tunnel pour vous.
        
        Apprenez en plus sur la façon d'ajouter des fonctionnalités et des commandes à l'environnement MySQL pour créer une meilleure cohérence des données et une sécurité suffisante pour répondre à toutes les responsabilités de tout gestionnaire de données.
        
        Vous apprendrez également des techniques et des méthodes spécifiques qui peuvent être utilisées pour maintenir les bases de données, afin de les garder sécurisées, bien organisées et rapides.
        
        Le MySQL ultime pour les débutants
        
        L'acquisition de cette compétence vous rendra indispensable en cette ère de l'information car MySQL en tant que cours est un outil très utile à avoir. Il ne nécessite pas d'expertise technique ou d'expérience avant d'apprendre à utiliser MySQL car il est destiné aux débutants
        ");
        $video2->setYear(2023);
        $video2->setImage("https://www.thibaultmorizet.fr/assets/product-images/2.jpeg");
        $video2->setUnitpriceht(18.95);
        $video2->setStock($faker->numberBetween(min: 50, max: 600));
        $video2->addAuthor($this->getReference('author17'));
        $video2->addCategory($this->getReference('category3'));
        $video2->setTaxe($this->getReference('taxe1'));
        $video2->setVisitnumber($faker->numberBetween(max: 500));
        $video2->setSoldnumber($faker->numberBetween(max: $video2->getVisitnumber()));
        $manager->persist($video2);
        $this->addReference('video2', $video2);

        $video3 = new Video();
        $video3->setTitle("Base de données universelle");
        $video3->setBrand($this->getReference('marque3'));
        $video3->setSummary("
        Le programme ci – dessous représente une base de données universelle et permet de tenir le comptage de n'importe quels objets. Vos clients, ventes, articles – vous pouvez tout régler vous – mêmes et profiter de tous les points forts de ses fonctions diversifiées.
        
        Au début vous, étant en qualité de l'utilisateur, créez la structure des objets qui sont soumis au comptage. Les charactéristiques des objets peuvent être de types différents: texts, listes, nombre, date, sommes etc. Les objets peuvent contenir des autres objets ou même les tableaux avec des autres objets. Les possibilités de la création des structures des objets sont énormes.
        
        Pour chaque type de l'objet le programme crée automatiquement le registre qui contient le tableau avec des objets de chaque type. On peut y appliquer des filtres différents. Vos paramètres du filtre restent invariables lors du redémarrage du programme. Quelque soit la structure créée chaque objet obtient son numéro, titre, date de la création, date de la modification, champ pour les remarques. On peut les utuliser comme les paramètres de la recherche.
        
        On peut créer des liens entre les objets qui sont en cours de traitement. Ainsi on peut associer quelques objets à un objet. On peut ajouter des images, qui sont prises du support des données ou du scanneur, aux objets qui sont en cours de traitement.
        
        Grâce à notre programme vous obtenez une solution programmatique individuelle lequel vous pouvez régler selon vos besoins. N'importe quand vous pouvez vous – mêmes modifier les structures des objets qui sont en cours de traitement et ajouter de nouvelles structures. Ainsi le programme vous aidera à simplifier le comptage de vos objets et facilitera considérablement votre travail.
        ");
        $video3->setYear(2016);
        $video3->setImage("https://www.thibaultmorizet.fr/assets/product-images/3.jpeg");
        $video3->setUnitpriceht(47.38);
        $video3->setStock($faker->numberBetween(min: 50, max: 600));
        $video3->addCategory($this->getReference('category3'));
        $video3->setTaxe($this->getReference('taxe1'));
        $video3->setVisitnumber($faker->numberBetween(max: 500));
        $video3->setSoldnumber($faker->numberBetween(max: $video3->getVisitnumber()));
        $manager->persist($video3);
        $this->addReference('video3', $video3);

        $video4 = new Video();
        $video4->setTitle("HTML et CSS - Le Cours Complet");
        $video4->setBrand($this->getReference('marque2'));
        $video4->setSummary("
        Vous souhaitez devenir développeur web? 
        Vous voulez être capable de créer un site Internet? 
        Vous êtes un débutant dans ce domaine? 
        Alors vous êtes exactement là ou vous devez être !
        
        Dans ce cours on va apprendre ensemble les bases du web, c'est à dire HTML et CSS.
        
        HTML c'est quoi?
        C'est un langage composé de ce que l'on appelle des tags qui vont nous permettre de représenter la structure de nos pages Web: un titre, un paragraphe, des images, etc...
        Maintenant, il faut savoir que HTML sans CSS c'est pas très joli !
        C'est pourquoi HTML vient souvent avec son fidéle compagnon: le CSS.

        CSS c'est quoi?
        C'est un langage qui va décorer notre HTML, il est responsable des couleurs, des tailles, de la mise en page, etc...
        
        Dans ce cours vous allez construire un site Web depuis 0 avec uniquement de l'HTML et du CSS.
        Vous allez taper vos premiéres lignes de code ! Je vous assisterai et vous expliquerai en détails chacune des étapes.
        Allez ! Au boulot ! On passe à l'action !
            ");
        $video4->setYear(2022);
        $video4->setImage("https://www.thibaultmorizet.fr/assets/product-images/4.jpeg");
        $video4->setUnitpriceht(104.26);
        $video4->setStock($faker->numberBetween(min: 50, max: 600));
        $video4->addAuthor($this->getReference('author18'));
        $video4->addCategory($this->getReference('category1'));
        $video4->setTaxe($this->getReference('taxe1'));
        $video4->setVisitnumber($faker->numberBetween(max: 500));
        $video4->setSoldnumber($faker->numberBetween(max: $video4->getVisitnumber()));
        $manager->persist($video4);
        $this->addReference('video4', $video4);

        $video5 = new Video();
        $video5->setTitle("VRAIMENT Bien Comprendre Javascript");
        $video5->setBrand($this->getReference('marque2'));
        $video5->setSummary("
        Ce cours est spécial: rien que le titre déjà: VRAIMENT Bien Comprendre Javascript !!! C’est pas un peu exagéré tout ça ? Et bien non… Sachez que c’est le cours le plus compliqué que j’ai fait jusqu’à présent.
        
        Pourquoi compliqué ?
        
        Parce qu’on va rentrer dans les détails des détails. Vous allez réellement comprendre comment fonctionne Javascript en profondeur. D’ailleurs pour vous lancer dans ce cours, vous devez déjà connaître un minimum les bases de Javascript.
        
        Le but c’est de comprendre toutes les subtilités de ce langage. Au final, vous ferez partie du peu de gens qui peuvent se vanter de maîtriser Javascript Vous pourrez déchirer vos entretiens ! 

        Et oui ! Vous serez capable de répondre à tous ces petits tests qu’adorent donner les recruteurs. Mais surtout, vous comprendrez enfin l’envers du décor et ça fera de vous des meilleurs développeurs.
         
        Mais alors attention ! Devenir un monstre en Javascript a un prix ! Il va falloir vous accrocher car je vous préviens tout de suite: vous allez transpirer du cerveau… c’est pour ça que j’ai mis une casquette d’ailleurs. Bref dans ce cours, il va falloir vous donner à 100%.
        ");
        $video5->setYear(2022);
        $video5->setImage("https://www.thibaultmorizet.fr/assets/product-images/5.jpeg");
        $video5->setUnitpriceht(104.26);
        $video5->setStock($faker->numberBetween(min: 50, max: 600));
        $video5->addAuthor($this->getReference('author18'));
        $video5->addCategory($this->getReference('category1'));
        $video5->addCategory($this->getReference('category6'));
        $video5->setTaxe($this->getReference('taxe1'));
        $video5->setVisitnumber($faker->numberBetween(max: 500));
        $video5->setSoldnumber($faker->numberBetween(max: $video5->getVisitnumber()));
        $manager->persist($video5);
        $this->addReference('video5', $video5);

        $video6 = new Video();
        $video6->setTitle("Conception de bases de données et langage SQL");
        $video6->setBrand($this->getReference('marque2'));
        $video6->setSummary("
        Prérequis

        Les bases de l'informatique.
        Un peu d'anglais... mais un anglais d'aéroport suffit.
        Une machine sous Windows, Linux ou Mac OS.
        Une forte motivation !
        
        À qui ce cours s'adresse-t-il ?
        
        Développeurs web débutants ou intermédiaires désireux de consolider leurs connaissances théoriques et leur maîtrise du langage SQL.
        ");
        $video6->setYear(2022);
        $video6->setImage("https://www.thibaultmorizet.fr/assets/product-images/6.jpeg");
        $video6->setUnitpriceht(104.26);
        $video6->setStock($faker->numberBetween(min: 50, max: 600));
        $video6->addAuthor($this->getReference('author19'));
        $video6->addCategory($this->getReference('category3'));
        $video6->setTaxe($this->getReference('taxe1'));
        $video6->setVisitnumber($faker->numberBetween(max: 500));
        $video6->setSoldnumber($faker->numberBetween(max: $video6->getVisitnumber()));
        $manager->persist($video6);
        $this->addReference('video6', $video6);

        $video7 = new Video();
        $video7->setTitle("JavaScript : la formation ULTIME");
        $video7->setBrand($this->getReference('marque2'));
        $video7->setSummary("
        JavaScript est vraiment LE langage de programmation que vous devez connaître si vous voulez vous lancer dans le développement web. Et ça tombe bien : avec ce cours, vous êtes sûr de ne pas passer à côté d’une notion importante, car il est complet ! En plus de ça, ce cours vous permettra de réaliser 8 projets, des dizaines d’exercices et une cinquantaine de challenges en cours de vidéo !

        Vous êtes sur le cours le plus complet, le plus pédagogique et le plus clair concernant JavaScript, et en plus : il est continuellement mis à jour ! Le plan de ce cours a été réalisé après des semaines de travail, en concordance avec ce qu’il y a de mieux en terme de pédagogie pour apprendre et surtout retenir chaque concept évoqué.

        Ce n’est pas un cours dans lequel vous êtes jeté dans la jungle : vous serez continuellement suivi avec la possibilité de poser des questions à n’importe quel moment pour avoir une réponse précise de notre équipe.

        Que vous soyez débutant ou déjà bien avancé avec le JavaScript, ce cours vous apprendra de nouvelles choses et de nouvelles façons de programmer, tant il est complet.

        Si vous êtes motivé, intéressé par JavaScript, et que vous recherchez un cours dans lequel vous ne serez pas déçu : arrêtez-vous. Vous êtes à la bonne porte !

        J'aurai plaisir à vous aider à atteindre vos objectifs.
        ");
        $video7->setYear(2022);
        $video7->setImage("https://www.thibaultmorizet.fr/assets/product-images/7.jpeg");
        $video7->setUnitpriceht(113.64);
        $video7->setStock($faker->numberBetween(min: 50, max: 600));
        $video7->addAuthor($this->getReference('author20'));
        $video7->addCategory($this->getReference('category1'));
        $video7->addCategory($this->getReference('category6'));
        $video7->setTaxe($this->getReference('taxe1'));
        $video7->setVisitnumber($faker->numberBetween(max: 500));
        $video7->setSoldnumber($faker->numberBetween(max: $video7->getVisitnumber()));
        $manager->persist($video7);
        $this->addReference('video7', $video7);

        $video8 = new Video();
        $video8->setTitle("PHP et MySQL : la formation ULTIME");
        $video8->setBrand($this->getReference('marque2'));
        $video8->setSummary("
        Envie de devenir un pro en PHP ? D’utiliser des données utilisateurs grâce à MySQL ? De créer le prochain Google ? Un nouveau Facebook ? Ou une startup ? Ce cours est fait pour vous.
        
        Mon objectif ? Faire de cette formation LA formation ULTIME sur PHP et MySQL.
        ");
        $video8->setYear(2022);
        $video8->setImage("https://www.thibaultmorizet.fr/assets/product-images/8.jpeg");
        $video8->setUnitpriceht(104.26);
        $video8->setStock($faker->numberBetween(min: 50, max: 600));
        $video8->addAuthor($this->getReference('author20'));
        $video8->addCategory($this->getReference('category1'));
        $video8->addCategory($this->getReference('category3'));
        $video8->setTaxe($this->getReference('taxe1'));
        $video8->setVisitnumber($faker->numberBetween(max: 500));
        $video8->setSoldnumber($faker->numberBetween(max: $video8->getVisitnumber()));
        $manager->persist($video8);
        $this->addReference('video8', $video8);

        $video9 = new Video();
        $video9->setTitle("Modern PHP Web Development w/ MySQL, GitHub & Heroku");
        $video9->setBrand($this->getReference('marque2'));
        $video9->setSummary("
        This course is designed to equip students with the skills required for creating dynamic web pages using PHP and MySQL. It further equips students with the fundamentals of PHP programming, while providing them with advanced features of the language. Immerse yourself in an end-to-end full-stack development experience, as we explore user interface design, business logic and hosting activities.
        
        By the end of this course, you will be able to build an attractive PHP application; styled using Bootstrap 4; track and manage changes with GitHub and deploy a fully data-driven application to Heroku Cloud Hosting.
        
        Why Learn Development with PHP 
        
        PHP was designed to make web development easier, and many beginners find it effortless to pick up and get started with. In fact, PHP code was so easy to pick up, many non-programmers end up being able to write PHP application in no time!
        ");
        $video9->setYear(2022);
        $video9->setImage("https://www.thibaultmorizet.fr/assets/product-images/9.jpeg");
        $video9->setUnitpriceht(18.95);
        $video9->setStock($faker->numberBetween(min: 50, max: 600));
        $video9->addAuthor($this->getReference('author21'));
        $video9->addAuthor($this->getReference('author22'));
        $video9->addAuthor($this->getReference('author23'));
        $video9->addCategory($this->getReference('category1'));
        $video9->addCategory($this->getReference('category3'));
        $video9->addCategory($this->getReference('category4'));
        $video9->setTaxe($this->getReference('taxe1'));
        $video9->setVisitnumber($faker->numberBetween(max: 500));
        $video9->setSoldnumber($faker->numberBetween(max: $video9->getVisitnumber()));
        $manager->persist($video9);
        $this->addReference('video9', $video9);

        $video10 = new Video();
        $video10->setTitle("JavaScript And PHP And Python Programming Complete Course");
        $video10->setBrand($this->getReference('marque2'));
        $video10->setSummary("
        JavaScript And PHP And Python Programming language Complete Course
        ");
        $video10->setYear(2022);
        $video10->setImage("https://www.thibaultmorizet.fr/assets/product-images/10.jpeg");
        $video10->setUnitpriceht(18.95);
        $video10->setStock($faker->numberBetween(min: 50, max: 600));
        $video10->addAuthor($this->getReference('author24'));
        $video10->addCategory($this->getReference('category1'));
        $video10->addCategory($this->getReference('category5'));
        $video10->addCategory($this->getReference('category6'));
        $video10->setTaxe($this->getReference('taxe1'));
        $video10->setVisitnumber($faker->numberBetween(max: 500));
        $video10->setSoldnumber($faker->numberBetween(max: $video10->getVisitnumber()));
        $manager->persist($video10);
        $this->addReference('video10', $video10);

        $manager->flush();
    }
}
