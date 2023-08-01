<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RecetteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recette::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action->setIcon('fa-solid fa-magnifying-glass')->setLabel(false);
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-edit')->setLabel(false);
            });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->showEntityActionsInlined()
            ->setEntityLabelInSingular('Recette')
            ->setEntityLabelInPlural('Recettes')
            ->setPageTitle('index', 'Recettes')
            ->setPageTitle('new', 'Ajouter une recette')
            ->setPageTitle('detail', 'Détail de la recette')
            ->setPageTitle('edit', 'Modifier une recette')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
        IdField::new('id')
            ->hideOnForm()
            ->hideOnDetail()
            ->hideOnIndex(),
        TextField::new('nom')
        ->setLabel('Nom'),
        AssociationField::new('user')
        ->setLabel('Utilisateur'),
        AssociationField::new('cepage1')
        ->setLabel('Cépage 1'),
        IntegerField::new('quantite1')->setSortable(false)
        ->setLabel('Quantité'),
        AssociationField::new('cepage2')->autocomplete()
        ->setLabel('Cépage 2'),
        IntegerField::new('quantite2')->setSortable(false)
        ->setLabel('Quantité'),
        AssociationField::new('cepage3')->autocomplete()
        ->setLabel('Cépage 3'),
        IntegerField::new('quantite3')->setSortable(false)
        ->setLabel('Quantité'),
        AssociationField::new('cepage4')->autocomplete()
        ->setLabel('Cépage 4'),
        IntegerField::new('quantite4')->setSortable(false)
        ->setLabel('Quantité'),
        BooleanField::new('winner', 'Gagnant'),
        ];
    }
}
