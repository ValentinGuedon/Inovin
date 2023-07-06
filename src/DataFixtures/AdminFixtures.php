<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use DateTime;
use Symfony\Component\String\Slugger\SluggerInterface;

class AdminFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;
    private SluggerInterface $slugger;

    public function __construct(UserPasswordHasherInterface $passwordHasher, SluggerInterface $slugger)
    {
        $this->passwordHasher = $passwordHasher;
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setName('Kutuk');
        $admin->setEmail('yavuz@gmail.com');
        $admin->setFirstname('Yavuz');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setStreet('27 Rue Des Abeilles');
        $admin->setPostalcode(67000);
        $admin->setCity('Strasbourg');
        $admin->setPhone('0612345678');
        $admin->setParticipant(null);
        $admin->setArome([]);
        $admin->setWineType('sec');
        $admin->setWineColor('blanc');

        $birthdate = new DateTime('2023-01-01');
        $admin->setBirthdate($birthdate);
        $slug = $this->slugger->slug($admin->getName());
        $admin->setSlug($slug);
        // Hashage du mot de passe
        $password = $this->passwordHasher->hashPassword($admin, '123456');
        $admin->setPassword($password);

        // Sauvegarde de l'administrateur en base de données
        $manager->persist($admin);
        $manager->flush();
    }
}
