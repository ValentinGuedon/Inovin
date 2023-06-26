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

        yield TextField::new('email');

        yield TextField::new('name');
        yield TextField::new('firstname');
        yield TextField::new('street')
        ->setSortable(false);
        yield IntegerField::new('postalcode');
        yield TextField::new('city');
        yield DateField::new('birthdate')
            ->setFormat('dd/MM yyyy');
        yield TextField::new('phone')
        ->setSortable(false);
    }
}
