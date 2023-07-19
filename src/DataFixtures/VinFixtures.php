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

        $vin1 = new Vin();

        $vin1->setNom('VILLA DES ANGES RESERVE - JEFF CARREL');
        $vin1->setDescription('Encore une fois, Jeff Carrel nous offre un rapport qualité-prix implacable. 
        Ce vin du Languedoc expressif et fruité est enrobé par une belle matière et soyeux. Légèrement boisé sans 
        être trop marqué, il offre une complexité rare à ce prix-là ! Du sur-mesure pour un apéritif improvisé, 
        un barbecue… ou juste comme ça, pour le plaisir !');
        $vin1->setRegion('Occitanie');
        $vin1->setMillesime('2021');
        $vin1->setDegreAlcool('14');
        $vin1->setPrix('9.5');
        $vin1->setImage('villa-des-anges-reserve-2021-jeff-carrel.png');
        $vin1->setCouleur('Rouge');
        $vin1->setLimpidite($limpidite[array_rand($limpidite, 1)]);
        $vin1->setFluidite($fluidite[array_rand($fluidite, 1)]);

        // Choix aléatoire du nombre d'arômes entre 2 et le nombre total d'arômes
        $nombreAromes = rand(2, count($arome));
        // Choix aléatoire des clés d'arômes
        $aromesAleatoires = array_rand($arome, $nombreAromes);
        $aromesSelectionnes = [];
        // Accéder aux valeurs correspondantes dans le tableau $arome
        foreach ($aromesAleatoires as $indice) {
            $aromesSelectionnes[] = $arome[$indice];
        }
        $vin1->setArome($aromesSelectionnes);
        $vin1->setPersistance($persistance[array_rand($persistance, 1)]);
        $vin1->setStructure($structure[array_rand($structure, 1)]);
        $vin1->setMatiere($matiere[array_rand($matiere, 1)]);
        $vin1->setBrillance($faker->numberBetween(0, 10));
        $vin1->setIntensite($faker->numberBetween(0, 10));
        $vin1->setAlcool($faker->numberBetween(0, 10));
        $vin1->setDouceur($faker->numberBetween(0, 10));
        $vin1->setStar(0);
        $vin1->setSlug($this->slugger->slug($vin1->getNom()));
        $vin1->setProfil($this->getReference('intense et audacieux'));


        $vin2 = new Vin();

        $vin2->setNom('PAVILLON DU GLANA - SECOND VIN DU CHATEAU GLANA');
        $vin2->setDescription('Faisant face au Château Ducru-Beaucaillou à Saint-Julien, cette propriété 
        appartient à la famille Meffre depuis 1961 (également propriétaire du Château Bellegrave à Pauillac).
        Aujourd’hui, ce sont les deux petits-fils de son créateur qui s’en occupent avec passion, produisant
        des vins onctueux. Ce second vin du Château du Glana est produit avec les mêmes soins que son aîné et
        se présente comme un vin complexe, velouté et puissant qui trouve son juste équilibre entre finesse 
        et structure. Un authentique Saint-Julien avec toujours beaucoup de fruit et de plaisir!');
        $vin2->setRegion('Bordeaux');
        $vin2->setMillesime('2017');
        $vin2->setDegreAlcool('13.5');
        $vin2->setPrix('18.9');
        $vin2->setImage('pavillon-du-glana-2017-second-vin-du-chateau-glana.png');
        $vin2->setCouleur('Rouge');
        $vin2->setLimpidite($limpidite[array_rand($limpidite, 1)]);
        $vin2->setFluidite($fluidite[array_rand($fluidite, 1)]);

        // Choix aléatoire du nombre d'arômes entre 2 et le nombre total d'arômes
        $nombreAromes = rand(2, count($arome));
        // Choix aléatoire des clés d'arômes
        $aromesAleatoires = array_rand($arome, $nombreAromes);
        $aromesSelectionnes = [];
        // Accéder aux valeurs correspondantes dans le tableau $arome
        foreach ($aromesAleatoires as $indice) {
            $aromesSelectionnes[] = $arome[$indice];
        }
        $vin2->setArome($aromesSelectionnes);
        $vin2->setPersistance($persistance[array_rand($persistance, 1)]);
        $vin2->setStructure($structure[array_rand($structure, 1)]);
        $vin2->setMatiere($matiere[array_rand($matiere, 1)]);
        $vin2->setBrillance($faker->numberBetween(0, 10));
        $vin2->setIntensite($faker->numberBetween(0, 10));
        $vin2->setAlcool($faker->numberBetween(0, 10));
        $vin2->setDouceur($faker->numberBetween(0, 10));
        $vin2->setStar(0);
        $vin2->setSlug($this->slugger->slug($vin2->getNom()));
        $vin2->setProfil($this->getReference('frais et léger'));

        $vin3 = new Vin();

        $vin3->setNom('FIGUERETTE BLANC - DOMAINE DE LA CLAPIERE');
        $vin3->setDescription('Dernière cuvée créée par le Domaine de la Clapière, elle a déjà séduit 
        tous ceux qui l\'ont goûté. La palette aromatique est riche sur des notes florales et de fruis 
        à chair jaune. La bouche est ronde et équilibrée par une grande fraîcheur. Cette harmonie est 
        liée à un assemblage réfléchi avec du Chardonnay, du Grenache gris et blanc et enfin du Viognier.');
        $vin3->setRegion('Occitanie');
        $vin3->setMillesime('2022');
        $vin3->setDegreAlcool('12.5');
        $vin3->setPrix('6.8');
        $vin3->setImage('figuerette-blanc-2022-domaine-de-la-clapiere.png');
        $vin3->setCouleur('Blanc');
        $vin3->setLimpidite($limpidite[array_rand($limpidite, 1)]);
        $vin3->setFluidite($fluidite[array_rand($fluidite, 1)]);

        // Choix aléatoire du nombre d'arômes entre 2 et le nombre total d'arômes
        $nombreAromes = rand(2, count($arome));
        // Choix aléatoire des clés d'arômes
        $aromesAleatoires = array_rand($arome, $nombreAromes);
        $aromesSelectionnes = [];
        // Accéder aux valeurs correspondantes dans le tableau $arome
        foreach ($aromesAleatoires as $indice) {
            $aromesSelectionnes[] = $arome[$indice];
        }
        $vin3->setArome($aromesSelectionnes);
        $vin3->setPersistance($persistance[array_rand($persistance, 1)]);
        $vin3->setStructure($structure[array_rand($structure, 1)]);
        $vin3->setMatiere($matiere[array_rand($matiere, 1)]);
        $vin3->setBrillance($faker->numberBetween(0, 10));
        $vin3->setIntensite($faker->numberBetween(0, 10));
        $vin3->setAlcool($faker->numberBetween(0, 10));
        $vin3->setDouceur($faker->numberBetween(0, 10));
        $vin3->setStar(1);
        $vin3->setSlug($this->slugger->slug($vin3->getNom()));
        $vin3->setProfil($this->getReference('délicat et raffiné'));

        $vin4 = new Vin();

        $vin4->setNom('UBY - DOMAINE UBY');
        $vin4->setDescription('En matière d\'arômes et de légèreté, Uby atteint presque son paroxysme avec 002, 
        une cuvée effervescente et entièrement conçue sous le signe de la fraîcheur. Ses bulles, fines et légères, 
        laissent échapper un subtil bouquet de fruits de la passion, d’ananas et d’agrumes qui, en bouche, se mêle au 
        pétillant dans un festival de fraîcheur et de douceur. La boisson originale, à prix tout petit : à découvrir 
        absolument !');
        $vin4->setRegion('Vénétie');
        $vin4->setMillesime('2022');
        $vin4->setDegreAlcool('11');
        $vin4->setPrix('7.6');
        $vin4->setImage('uby-002-2022-domaine-uby.png');
        $vin4->setCouleur('Blanc');
        $vin4->setLimpidite($limpidite[array_rand($limpidite, 1)]);
        $vin4->setFluidite($fluidite[array_rand($fluidite, 1)]);

        // Choix aléatoire du nombre d'arômes entre 2 et le nombre total d'arômes
        $nombreAromes = rand(2, count($arome));
        // Choix aléatoire des clés d'arômes
        $aromesAleatoires = array_rand($arome, $nombreAromes);
        $aromesSelectionnes = [];
        // Accéder aux valeurs correspondantes dans le tableau $arome
        foreach ($aromesAleatoires as $indice) {
            $aromesSelectionnes[] = $arome[$indice];
        }
        $vin4->setArome($aromesSelectionnes);
        $vin4->setPersistance($persistance[array_rand($persistance, 1)]);
        $vin4->setStructure($structure[array_rand($structure, 1)]);
        $vin4->setMatiere($matiere[array_rand($matiere, 1)]);
        $vin4->setBrillance($faker->numberBetween(0, 10));
        $vin4->setIntensite($faker->numberBetween(0, 10));
        $vin4->setAlcool($faker->numberBetween(0, 10));
        $vin4->setDouceur($faker->numberBetween(0, 10));
        $vin4->setStar(0);
        $vin4->setSlug($this->slugger->slug($vin4->getNom()));
        $vin4->setProfil($this->getReference('frais et léger'));

        $vin5 = new Vin();

        $vin5->setNom('PROSECCO BRUT BIO - SAVIAN');
        $vin5->setDescription('Amateurs de Prosecco, cette cuvée est faite pour vous ! Il possède un tableau olfactif 
        d\'une bonne ampleur et d\'une grande élégance. Ses petits arômes de poire et de pomme verte, mais aussi 
        d\'agrumes se mêlent parfaitement à un ensemble floral (thym et sauge). Harmonieux et très agréable en bouche, 
        il vous garantit un excellent moment de dégustation !');
        $vin5->setRegion('Vénétie');
        $vin5->setMillesime('2022');
        $vin5->setDegreAlcool('11');
        $vin5->setPrix('9.3');
        $vin5->setImage('prosecco-brut-bio-savian.png');
        $vin5->setCouleur('Blanc');
        $vin5->setLimpidite($limpidite[array_rand($limpidite, 1)]);
        $vin5->setFluidite($fluidite[array_rand($fluidite, 1)]);

        // Choix aléatoire du nombre d'arômes entre 2 et le nombre total d'arômes
        $nombreAromes = rand(2, count($arome));
        // Choix aléatoire des clés d'arômes
        $aromesAleatoires = array_rand($arome, $nombreAromes);
        $aromesSelectionnes = [];
        // Accéder aux valeurs correspondantes dans le tableau $arome
        foreach ($aromesAleatoires as $indice) {
            $aromesSelectionnes[] = $arome[$indice];
        }
        $vin5->setArome($aromesSelectionnes);
        $vin5->setPersistance($persistance[array_rand($persistance, 1)]);
        $vin5->setStructure($structure[array_rand($structure, 1)]);
        $vin5->setMatiere($matiere[array_rand($matiere, 1)]);
        $vin5->setBrillance($faker->numberBetween(0, 10));
        $vin5->setIntensite($faker->numberBetween(0, 10));
        $vin5->setAlcool($faker->numberBetween(0, 10));
        $vin5->setDouceur($faker->numberBetween(0, 10));
        $vin5->setStar(1);
        $vin5->setSlug($this->slugger->slug($vin5->getNom()));
        $vin5->setProfil($this->getReference('délicat et raffiné'));

        $vin6 = new Vin();

        $vin6->setNom('PREMIERES GRIVES - DOMAINE TARIQUET');
        $vin6->setDescription('Les Premières Grives ou le plaisir de se faire plaisir... ! Succès mondial, les 
        " Premières Grives " du Domaine du Tariquet c\'est avant tout : "une bouche gourmande, fruitée , vive et 
        moelleuse (fruits exotiques, agrumes et raisins frais)." C\'est un vin qui se glisse entre 2 sensations : 
        celle d\'une onctuosité enjôleuse, conjuguée à une profonde fraîcheur. Ce duo moelleux/fraîcheur, 
        qui fonctionne à merveille, lui donne cette originalité si recherchée. Il se boit et se partage en 
        toutes occasions, avec des atouts si redoutables qu\'à l\'aveugle, on ne peut se douter de son formidable 
        rapport qualité-prix...!');
        $vin6->setRegion('Bordeaux');
        $vin6->setMillesime('2021');
        $vin6->setDegreAlcool('11.5');
        $vin6->setPrix('9.6');
        $vin6->setImage('premieres-grives-2022-domaine-tariquet.png');
        $vin6->setCouleur('Blanc');
        $vin6->setLimpidite($limpidite[array_rand($limpidite, 1)]);
        $vin6->setFluidite($fluidite[array_rand($fluidite, 1)]);

        // Choix aléatoire du nombre d'arômes entre 2 et le nombre total d'arômes
        $nombreAromes = rand(2, count($arome));
        // Choix aléatoire des clés d'arômes
        $aromesAleatoires = array_rand($arome, $nombreAromes);
        $aromesSelectionnes = [];
        // Accéder aux valeurs correspondantes dans le tableau $arome
        foreach ($aromesAleatoires as $indice) {
            $aromesSelectionnes[] = $arome[$indice];
        }
        $vin6->setArome($aromesSelectionnes);
        $vin6->setPersistance($persistance[array_rand($persistance, 1)]);
        $vin6->setStructure($structure[array_rand($structure, 1)]);
        $vin6->setMatiere($matiere[array_rand($matiere, 1)]);
        $vin6->setBrillance($faker->numberBetween(0, 10));
        $vin6->setIntensite($faker->numberBetween(0, 10));
        $vin6->setAlcool($faker->numberBetween(0, 10));
        $vin6->setDouceur($faker->numberBetween(0, 10));
        $vin6->setStar(1);
        $vin6->setSlug($this->slugger->slug($vin6->getNom()));
        $vin6->setProfil($this->getReference('intense et audacieux'));

        $vin7 = new Vin();

        $vin7->setNom('SHEEP SAUVIGNON BLANC - TUSSOCK JUMPER');
        $vin7->setDescription('Ce vin libère des notes d’agrumes très fraîches, que l’on retrouve en 
        bouche dans une trame, croquante et souple, marquée par les herbes fraîches et une touche citronnée.
        C’est une lecture très agréable du Sauvignon de Nouvelle Zélande, compagnon idéal de apéritif et 
        poissons blancs ! Vous allez vous régaler.');
        $vin7->setRegion('Nouvelle-Zélande');
        $vin7->setMillesime('2021');
        $vin7->setDegreAlcool('12');
        $vin7->setPrix('8.7');
        $vin7->setImage('sheep-sauvignon-blanc-2022-tussock-jumper.png');
        $vin7->setCouleur('Blanc');
        $vin7->setLimpidite($limpidite[array_rand($limpidite, 1)]);
        $vin7->setFluidite($fluidite[array_rand($fluidite, 1)]);

        // Choix aléatoire du nombre d'arômes entre 2 et le nombre total d'arômes
        $nombreAromes = rand(2, count($arome));
        // Choix aléatoire des clés d'arômes
        $aromesAleatoires = array_rand($arome, $nombreAromes);
        $aromesSelectionnes = [];
        // Accéder aux valeurs correspondantes dans le tableau $arome
        foreach ($aromesAleatoires as $indice) {
            $aromesSelectionnes[] = $arome[$indice];
        }
        $vin7->setArome($aromesSelectionnes);
        $vin7->setPersistance($persistance[array_rand($persistance, 1)]);
        $vin7->setStructure($structure[array_rand($structure, 1)]);
        $vin7->setMatiere($matiere[array_rand($matiere, 1)]);
        $vin7->setBrillance($faker->numberBetween(0, 10));
        $vin7->setIntensite($faker->numberBetween(0, 10));
        $vin7->setAlcool($faker->numberBetween(0, 10));
        $vin7->setDouceur($faker->numberBetween(0, 10));
        $vin7->setStar(0);
        $vin7->setSlug($this->slugger->slug($vin7->getNom()));
        $vin7->setProfil($this->getReference('délicat et raffiné'));

        $manager->persist($vin1);
        $manager->persist($vin2);
        $manager->persist($vin3);
        $manager->persist($vin4);
        $manager->persist($vin5);
        $manager->persist($vin6);
        $manager->persist($vin7);

        $manager->flush();
    }
}
