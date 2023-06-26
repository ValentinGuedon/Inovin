<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\HiddenField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->disable(Action::NEW, Action::DELETE, Action::EDIT)
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        yield HiddenField::new('id')->hideOnForm()->hideOnIndex();

        yield TextField::new('email')
        ->setLabel('E-mail');
        yield TextField::new('name')
        ->setLabel('Nom');
        yield TextField::new('firstname')
        ->setLabel('Prénom');
        yield TextField::new('street')
        ->setLabel('Rue')
        ->setSortable(false);
        yield IntegerField::new('postalcode')
        ->setLabel('Code Postal');
        yield TextField::new('city');
        yield DateField::new('birthdate')
        ->setLabel('Date de Naissance')
        ->setFormat('dd/MM yyyy');
        yield TextField::new('phone')
        ->setLabel('Numéro de téléphone')
        ->setSortable(false);
    }
}
