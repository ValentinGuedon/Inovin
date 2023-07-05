<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use DateTime;
use Symfony\Component\String\Slugger\SluggerInterface;

class UserFixtures extends Fixture
{
    private SluggerInterface $slugger;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher, SluggerInterface $slugger)
    {
        $this->passwordHasher = $passwordHasher;
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setName('UserName1');
        $user->setEmail('user@gmail.com');
        $user->setFirstname('UserFirstname');
        $user->setRoles(['ROLE_USER']);
        $user->setStreet('99 Rue Des Bourdons');
        $user->setPostalcode(75000);
        $user->setCity('Paris');
        $user->setPhone('0687654321');
        $user->setParticipant(null);
        $user->setArome([]);
        $user->setWineType('sec');
        $user->setWineColor('blanc');

        $birthdate = new DateTime('2020-01-01');
        $user->setBirthdate($birthdate);
        $slug = $this->slugger->slug($user->getName());
        $user->setSlug($slug);
        // Hashage du mot de passe
        $password = $this->passwordHasher->hashPassword($user, '123456');
        $user->setPassword($password);

        // Sauvegarde de l'user en base de données
        $manager->persist($user);
        $manager->flush();
    }
}
