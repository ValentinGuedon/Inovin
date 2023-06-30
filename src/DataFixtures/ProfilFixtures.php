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
        ['Le chardo-né','Vous aimez tout ce qui est sec, acide et frais. Vous êtes parisien.ne ?'],
        ['Le terrien','Vous aimez les vins râpeux et puissant, de ceux qui sillonnent votre palais
        à grands coups de tanins'],
        ['Le bonbon','Pas de doute, paradis sucré est la plus juste description de votre cave idéale']
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
            $imageFilename = $profilData[2];
            $manager->persist($profil);
            $this->addReference($profilData[0], $profil);
        }
        $manager->flush();
    }
}
