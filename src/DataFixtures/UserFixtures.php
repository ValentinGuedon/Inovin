<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use DateTime;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setName('UserName1');
        $user->setEmail('user@gmail.com');
        $user->setLogin('UserLogin');
        $user->setFirstname('UserFirstname');
        $user->setRoles(['ROLE_USER']);
        $user->setStreet('Rue Des Bourdons');
        $user->setStreetnumber(99);
        $user->setPostalcode(75000);
        $user->setCity('Paris');
        $user->setPhone('0687654321');

        $birthdate = new DateTime('2020-01-01');
        $user->setBirthdate($birthdate);

        // Hashage du mot de passe
        $password = $this->passwordHasher->hashPassword($user, '123456');
        $user->setPassword($password);

        // Sauvegarde de l'user en base de données
        $manager->persist($user);
        $manager->flush();
    }
}
