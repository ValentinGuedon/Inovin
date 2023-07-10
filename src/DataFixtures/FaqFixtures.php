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
        $faq->setQuestion('Faut-il être majeur pour participer, même sans boire ?');
        $faq->setAnswer('Il faut impérativement plus de 18 ans 
        pour participer, même en temps que simple observateur.');

        $faq2 = new Faq();
        $faq2->setQuestion('Faut-il s\'incrire au préalable ?');
        $faq2->setAnswer('L\'inscription n\'est pas nécesaire, 
        mais si vous souhaitez que vos goûts soient prit en compte pour 
        la selection des vins vous devez créer votre 
        compte et remplir la fiche de pré degustation.');

        $faq3 = new Faq();
        $faq3->setQuestion('Comment se déroule un atelier de création de vin ?');
        $faq3->setAnswer('L’atelier dure 2h et se découpe ainsi : 
        45 minutes de dégustation de 4 mono-cépages où vous pouvez 
        remplir une fiche de dégustation numérique. 
        Puis 45 minutes d\'assemblage de vin personnalisé, 
        où vous pouvez mélanger les cépages selon vos préférences. 
        Et enfin 15 minutes de bouchage et de scellage de la bouteille 
        que vous pourrez emporter avec vous en tant que souvenir
         unique de votre expérience suivit d’un moment 
         d\'échange et de partage pour terminer.');

        $faq4 = new Faq();
        $faq4->setQuestion('Où se déroule les dégustation ?');
        $faq4->setAnswer('Les ateliers sont organisés principalement 
        en Lozère mais Inovin se déplace également dans toute la France. 
        Le lieu ainsi que les horaires sont indiqués au moment de la réservation');

        $manager->persist($faq);
        $manager->persist($faq2);
        $manager->persist($faq3);
        $manager->persist($faq4);
        $manager->flush();
    }
}
