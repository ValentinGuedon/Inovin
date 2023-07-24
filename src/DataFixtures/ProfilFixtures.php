<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Profil;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProfilFixtures extends Fixture
{
    private const PROFILS = [

        ['frais et léger','Vous préférez les vins qui offrent une sensation de fraîcheur et de légèreté.
        Vous appréciez les vins avec une acidité vive et des arômes frais et vivifiants.
        Votre palais est attiré par des vins qui rappellent les agrumes,
        les herbes fraîches et les fruits croquants.
        Votre profil gustatif est souvent associé à des vins blancs secs avec des notes
         d\'agrumes pétillantes et une minéralité vive, ou des vins rouges légers avec des arômes de baies
         fraîches et une note finale rafraîchissante.'],

        ['intense et audacieux', 'Vous recherchez des sensations gustatives fortes et puissantes dans vos vins.
        Vous appréciez les vins avec des saveurs intenses, épicées et expressives.
        Votre palais est prêt à découvrir des vins complexes.
        Votre profil gustatif est souvent associé à des vins rouges corsés et concentrés,
         avec des notes de fruits noirs mûrs, d\'épices et des tanins robustes.
         Vous pourriez également être attiré(e) par des vins blancs riches avec une
         acidité vive et des saveurs tropicales exotiques.'],


        ['délicat et raffiné','Vous appréciez les saveurs délicates et subtiles du vin.
        Votre palais est sensible aux nuances et aux arômes fins.
        Vous préférez les vins légers et équilibrés, mettant en valeur des notes fraîches et aérien.
        Votre profil gustatif est souvent associé à des vins offrant des saveurs délicieusement douces
        et une structure liquoreuse. Vous pourriez être attiré(e) par des vins blancs élégants avec des arômes
        floraux subtils et une acidité bien équilibrée, ou des vins rouges doux avec des notes de fruits rouges
        délicieux et peu de tanins.']
    ];

    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROFILS as $profilData) {
            $profil = new Profil();
            $profil->setName($profilData[0]);
            $profil->setDescription($profilData[1]);
            $slug = $this->slugger->slug($profil->getName());
            $profil->setSlug($slug);
            $manager->persist($profil);
            $this->addReference($profilData[0], $profil);
        }
        $manager->flush();
    }
}
