<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use DateTime;

class AdminFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setName('Kutuk');
        $admin->setEmail('yavuz@gmail.com');
        $admin->setLogin('Yavz');
        $admin->setFirstname('Yavuz');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setStreet('Rue Des Abeilles');
        $admin->setStreetnumber(27);
        $admin->setPostalcode(67000);
        $admin->setCity('Strasbourg');
        $admin->setPhone('0612345678');

        $birthdate = new DateTime('2023-01-01');
        $admin->setBirthdate($birthdate);

        // Hashage du mot de passe
        $password = $this->passwordHasher->hashPassword($admin, '123456');
        $admin->setPassword($password);

        // Sauvegarde de l'administrateur en base de données
        $manager->persist($admin);
        $manager->flush();
    }
}
