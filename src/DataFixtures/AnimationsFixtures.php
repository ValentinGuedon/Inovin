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

        $animation1->setNom('Atelier je crée mon vin 2h');
        $animation1->setPrix('70');
        $animation1->setResume('Atelier INOVIN pour créer votre propre vin personnalisé. Notre atelier INOVIN est 
        unique en son genre : vous apprendrez à créer votre propre vin en sélectionnant les arômes et les saveurs 
        que vous préférez. Vous pourrez ensuite enregistrer la composition de votre vin dans notre base de données 
        pour le reproduire à tout moment. Vous pourrez également présenter votre vin à notre concours. Nos ateliers
        INOVIN sont conçus pour vous offrir une expérience inoubliable, alliant découverte, apprentissage et 
        convivialité. Vous serez guidé par des experts passionnés et compétents, qui vous feront découvrir les 
        secrets de la création de vin. Nous proposons notre atelier INOVIN pour:Des événements d\'entreprise, 
        séminaires, événements privés,  passionnés et amateurs ... Souhaitant en apprendre davantagesur l\'art de 
        la vinification. Nos ateliers INOVIN sont adaptés à tous. Alors, prêts à créer votre propre vin ? N\'hésitez 
        pas à nous contacter pour en savoir davantage sur notre offre INOVIN ! L\'atelier se réalise par groupe de 
        5 à 10 personnes. Après réservation nous prenons contact avec vous pour définir d\'une date. A très vite !!!');
        $animation1->setDescription('Atelier INOVIN pour créer votre propre vin personnalisé.Notre atelier INOVIN est 
        unique en son genre : vous apprendrez à créer votre propre vin en sélectionnant les arômes et les saveurs 
        que vous préférez. Vous pourrez ensuite enregistrer la composition de votre vin dans notre base de données 
        pour le reproduire à tout moment. A très vite !!!');
        $animation1->setSlug($this->slugger->slug($animation1->getNom()));
        $animation1->setImage('atelier-1.jpg');

        $animation2 = new Animations();

        $animation2->setNom('Atelier dégustation accompagnements mets');
        $animation2->setPrix('30');
        $animation2->setResume('Atelier dégustation de 4 vins a l\'aveugle suivi d\'accompagnement de Mets.
        Nos ateliers INOVIN sont conçus pour vous offrir une expérience inoubliable, alliant découverte, 
        apprentissage et convivialité. Vous serez guidé par des experts passionnés et compétents, qui vous 
        feront découvrir les secrets du vin. Nous proposons notre atelier INOVIN pour:
        Des événements d\'entreprise,
        Des séminaires,
        Pour des amateurs souhaitant en apprendre davantage sur l\'art de déguster .
        Nos ateliers INOVIN sont adaptés à tous.
        Alors, prêts ? N\'hésitez pas à nous contacter pour en savoir davantage sur notre offre INOVIN !');
        $animation2->setDescription('Atelier dégustation de 4 vins a l\'aveugle suivi d\'accompagnement de Mets .
        Nos ateliers INOVIN sont conçus pour vous offrir une expérience inoubliable, alliant découverte, 
        apprentissage et convivialité. Vous serez guidé par des experts passionnés et compétents, qui vous 
        feront découvrir les secrets du vin. N\'hésitez pas à nous contacter pour en savoir davantage !');
        $animation2->setSlug($this->slugger->slug($animation2->getNom()));
        $animation2->setImage('atelier-2.jpg');

        $manager->persist($animation1);
        $manager->persist($animation2);

        $manager->flush();
    }
}
