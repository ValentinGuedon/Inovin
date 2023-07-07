<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecetteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recette::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE, Action::EDIT);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
        IdField::new('id')
            ->hideOnForm()
            ->hideOnIndex(),
        TextField::new('nom'),
        AssociationField::new('user'),
        AssociationField::new('vin1'),
        IntegerField::new('quantite')->setSortable(false),
        AssociationField::new('vin2')->autocomplete(),
        IntegerField::new('quantite2')->setSortable(false),
        AssociationField::new('vin3')->autocomplete(),
        IntegerField::new('quantite3')->setSortable(false),
        AssociationField::new('vin4')->autocomplete(),
        IntegerField::new('quantite4')->setSortable(false),
        ];
    }
}
