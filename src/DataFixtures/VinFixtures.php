<?php

namespace App\DataFixtures;

use App\Entity\Vin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class VinFixtures extends Fixture
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $arome = ['fruité','animal','épicé','floral','végétal','marin'];
        $limpidite = ['limpide','voilé','trouble', 'flou'];
        $fluidite = ['visqueuse','grasse','épaisse','coulante','fluide'];
        $persistance = ['courte','moyenne','persistante'];
        $structure = ['légère','fluide','charpentée'];
        $matiere = ['massive','étoffée','légère','fluette'];

        for ($i = 0; $i < 2; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $vin = new Vin();
                if ($i === 1) {
                    $vin->setCouleur('rouge');
                    $vin->setProfil($this->getReference('Le terrien'));
                }
                $vin->setNom($faker->name());
                // $vin->setSlug($this->slugger->slug($vin->getNom));
                $vin->setDescription($faker->text());
                $vin->setRegion($faker->name());
                $vin->setMillesime($faker->numberBetween(1900, 1999));
                $vin->setDegreAlcool($faker->numberBetween(11, 20));
                $vin->setPrix($faker->numberBetween(5, 1800));
                $vin->setLimpidite($limpidite[array_rand($limpidite, 1)]);
                $vin->setFluidite($fluidite[array_rand($fluidite, 1)]);
                $vin->setPersistance($persistance[array_rand($persistance, 1)]);
                $vin->setStructure($structure[array_rand($structure, 1)]);
                $vin->setMatiere($matiere[array_rand($matiere, 1)]);
                $vin->setArome([$arome[$i],$arome[$j]]);
                $vin->setBrillance($faker->numberBetween(0, 10));
                $vin->setAlcool($faker->numberBetween(0, 10));
                $vin->setDouceur($faker->numberBetween(0, 10));
                if ($i === 2) {
                    if ($vin->getDouceur() <= 5) {
                        $vin->setProfil($this->getReference('Le chardo-né'));
                    } else {
                        $vin->setProfil($this->getReference('Le bonbon'));
                    }
                }
                $manager->persist($vin);
            }
        }
        $manager->flush();
    }
}
