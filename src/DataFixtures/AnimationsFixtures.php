<?php

namespace App\DataFixtures;

use App\Entity\Animations;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Profil;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class AnimationsFixtures extends Fixture
{
    private const ANIMATIONS = [

        ['ATELIER CRÉATION PERSONNALISÉ DE VIN',

        '50',

        'Durant l\'atelier, les participants sont guidés par un sommelier professionnel 
        qui leur explique comment déguster et évaluer les différents vins. 
        Ensuite, les participants sont invités à choisir différents vins 
        qu\'ils ont préférés lors de la dégustation et à les mélanger pour 
        créer leur propre vin unique.',

        'Les participants pourront ainsi jouer le rôle d\'œnologue et expérimenter l\'art de l\'assemblage 
        pour créer un vin qui reflète leurs goûts personnels. 
        Le sommelier est là pour les conseiller sur les proportions, 
        les arômes et le caractère qu\'ils souhaitent intégrer à leur vin.
        L\'atelier convient aux amateurs de vin qui cherchent à s\'immerger dans 
        l\'univers du vin tout en recherchant une expérience interactive et divertissante. 
        Les participants peuvent ainsi découvrir les différentes étapes de la production du vin, 
        tout en créant une bouteille de vin unique et personnalisée.',


        ],

        ['ATELIER DÉGUSTATION',

        '70',

        'L\'atelier de dégustation et d\'accords d\'Inovin 
        est une expérience gustative unique qui met en valeur une sélection de vins exceptionnels 
        accompagnés de plats spécialement préparés par notre chef. Les participants à cet atelier auront 
        l\'occasion de découvrir les aspects délicieux de la combinaison de vins et de mets, 
        avec des combinaisons parfaitement harmonisées.',

        'La dégustation commence par une sélection de vins soigneusement 
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
        les paires de vin et de mets sont choisies.',
        ],
    ];

    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::ANIMATIONS as $animationsData) {
            $animations = new Animations();
            $animations->setNom($animationsData[0]);
            $animations->setPrix($animationsData[1]);
            $animations->setDescription($animationsData[2]);
            $animations->setResume($animationsData[3]);
            $slug = $this->slugger->slug($animations->getNom());
            $animations->setSlug($slug);
            $manager->persist($animations);
            $this->addReference($animationsData[0], $animations);
        }
        $manager->flush();
    }
}
