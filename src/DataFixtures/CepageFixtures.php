<?php

namespace App\DataFixtures;

use App\Entity\Cepage;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CepageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $cepage1 = new Cepage();
        $cepage1->setType('Le Pinot Noir');
        $cepage1->setDescription('Cépage rouge le plus planté de la Vallée du Rhône et de la 
        Bourgogne, le Pinot noir est un cépage pas toujours accommodant pour le vigneron. 
        Mais celui qui sait le manier et susurrer aux ceps de ce dernier sera en tirer un 
        nectar plus que merveilleux.');
        $manager->persist($cepage1);

        $cepage2 = new Cepage();
        $cepage2->setType('Le Merlot');
        $cepage2->setDescription('Lorsque l\'on pense au cépage Merlot, on pense Bordeaux !
        En effet, il s’agit de son terroir d’origine pourtant ce robuste cépage a fait un 
        long voyage avant de se retrouver planté aussi dans le Sud-ouest de la France et 
        dans le beau vignoble du Languedoc-Roussillon.');
        $manager->persist($cepage2);

        $cepage3 = new Cepage();
        $cepage3->setType('Le Malbec');
        $cepage3->setDescription('Le Malbec est un cépage noir. Il a quitté sa France natale 
        pour s’étendre aux terroirs argentins et chiliens. Il aime s’épanouir dans les sols 
        calcaires, argilo-calcaires ou argilo-graveleux. Cépage assez résistant et précoce, 
        ses baies moyennes à la peau fine donnent des jus sombres, aptes au vieillissement.');
        $manager->persist($cepage3);

        $cepage4 = new Cepage();
        $cepage4->setType('Le Trousseau');
        $cepage4->setDescription('Nous aurions pu vous parler de bien d\'autres cépages mais 
        nous aimons le Jura et ses vins, alors nous avons décidé de vous parler de ce cépage 
        noir jurassien… le Trousseau. Il représente environ 5% de l’encépagement du vignoble 
        jurassien. C’est donc un cépage très local que l’on retrouve autour du village de 
        Montigny-lès-Arsures.');
        $manager->persist($cepage4);

        $manager->flush();
    }
}
