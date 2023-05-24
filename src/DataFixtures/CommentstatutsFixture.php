<?php

namespace App\DataFixtures;

use App\Entity\Commentstatut;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommentstatutsFixture extends Fixture
{

    public function load(ObjectManager $manager): void
    {

        $commentstatut1 = new Commentstatut();
        $commentstatut1->setName("being_validated");
        $manager->persist($commentstatut1);

        $commentstatut2 = new Commentstatut();
        $commentstatut2->setName("accepted");
        $manager->persist($commentstatut2);

        $commentstatut3 = new Commentstatut();
        $commentstatut3->setName("rejected");
        $manager->persist($commentstatut3);


        $manager->flush();
    }
}
