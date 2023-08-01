<?php

namespace App\DataFixtures;

use App\Entity\Animations;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class AnimationsFixtures extends Fixture
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $animation1 = new Animations();

        $animation1->setNom('Atelier création de vin personnalisé');
        $animation1->setPrix('70');
        $animation1->setResume('Les participants pourront ainsi jouer le rôle d\'œnologue 
        et expérimenter l\'art de l\'assemblage pour créer un vin qui reflète leurs goûts personnels. 
        Le sommelier est là pour les conseiller sur les proportions, 
        les arômes et le caractère qu\'ils souhaitent intégrer à leur vin. 
        L\'atelier convient aux amateurs de vin qui cherchent à s\'immerger dans 
        l\'univers du vin tout en recherchant une expérience interactive et divertissante. 
        Les participants peuvent ainsi découvrir les différentes étapes de la production du vin, 
        tout en créant une bouteille de vin unique et personnalisée.');
        $animation1->setDescription('Durant l\'atelier, les participants sont guidés par un sommelier professionnel 
        qui leur explique comment déguster et évaluer les différents vins. 
        Ensuite, les participants sont invités à choisir différents vins 
        qu\'ils ont préférés lors de la dégustation et à les mélanger pour 
        créer leur propre vin unique.');
        $animation1->setSlug($this->slugger->slug($animation1->getNom()));
        $animation1->setImage('atelier-1.jpg');

        $animation2 = new Animations();

        $animation2->setNom('Atelier dégustation & mets');
        $animation2->setPrix('50');
        $animation2->setResume('La dégustation commence par une sélection de vins soigneusement 
        choisie par notre sommelier expert. Chaque vin est présenté avec sa fiche technique, 
        ses caractéristiques et ses particularités pour permettre aux participants 
        de mieux comprendre les différences entre chaque bouteille. 
        Ensuite, notre chef prépare une série de plats spécialement conçus pour correspondre 
        à chaque vin de la dégustation. Les participants ont l\'occasion de goûter chacun 
        des vins en combinaison avec le plat correspondant et 
        d\'apprécier la façon dont les arômes et les saveurs se transforment 
        lorsqu\'ils sont associés avec le mets. Notre sommelier explique également 
        les raisons pour lesquelles chaque vin a été choisi pour accompagner un plat spécifique, 
        en nous donnant des suggestions d\'appariement éventuelles. 
        En fin de compte, l\'atelier de dégustation et d\'accords d\'Inovin est une expérience culinaire 
        immersive qui permet aux participants de découvrir de nouvelles saveurs et de mieux comprendre comment
        les paires de vin et de mets sont choisies.');
        $animation2->setDescription('L\'atelier de dégustation et d\'accords d\'Inovin 
        est une expérience gustative unique qui met en valeur une sélection de vins exceptionnels 
        accompagnés de plats spécialement préparés par notre chef. Les participants à cet atelier auront 
        l\'occasion de découvrir les aspects délicieux de la combinaison de vins et de mets, 
        avec des combinaisons parfaitement harmonisées.');
        $animation2->setSlug($this->slugger->slug($animation2->getNom()));
        $animation2->setImage('atelier-2.jpg');

        $manager->persist($animation1);
        $manager->persist($animation2);
        $manager->flush();
    }
}
