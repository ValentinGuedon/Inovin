<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Faq;

class FaqFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faq = new Faq();
        $faq->setQuestion('Faut-il être majeur pour participer, même sans boire?');
        $faq->setAnswer('Il faut impérativement plus de 18ans 
        pour participer, même en temps que simple observateur.');

        $faq2 = new Faq();
        $faq2->setQuestion('Faut-il s\'incrire au préalable?');
        $faq2->setAnswer('L\'inscription n\'est pas nécesaire, 
        mais si vous souhaitez que vos goûts soient prit en compte pour 
        la selection des vins vous devez créer votre 
        compte et remplir la fiche de pré degustation.');

        $faq3 = new Faq();
        $faq3->setQuestion('Comment se déroule la dégustation?');
        $faq3->setAnswer('Vous arrivez, vous buvez, vous notez, 
        vous mélangez et vous repartez avec votre bouteille.');

        $faq4 = new Faq();
        $faq4->setQuestion('Où se déroule les dégustation?');
        $faq4->setAnswer('Toujours en Lozère mais le lieu change à chaque fois pour 
        varier les plaisirs! N\'oubliez pas de bien 
        vérifier l\'adresse lors de votre commande.');

        $manager->persist($faq);
        $manager->persist($faq2);
        $manager->persist($faq3);
        $manager->persist($faq4);
        $manager->flush();
    }
}
