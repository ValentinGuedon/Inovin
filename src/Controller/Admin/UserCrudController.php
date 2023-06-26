<?php

namespace App\Controller\Admin;

use App\Entity\User;
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

    public function configureFields(string $pageName): iterable
    {
        yield HiddenField::new('id')->hideOnForm()->hideOnIndex();

        yield TextField::new('email');

        yield TextField::new('name');
        yield TextField::new('firstname');
        yield TextField::new('street');
        yield IntegerField::new('postalcode');
        yield TextField::new('city');
        yield DateField::new('birthdate')->setFormat('yyyy-MM-dd');
        yield TextField::new('phone');

        yield AssociationField::new('ficheDegustations');
        yield AssociationField::new('favoris');
        yield AssociationField::new('jeux');
        yield AssociationField::new('recettes');
        yield AssociationField::new('caracteristiques');
        yield AssociationField::new('atelier');
    }
}
