<?php

namespace App\Controller\Admin;

use App\Entity\Vin;
use App\Entity\User;
use App\Entity\Cepage;
use App\Entity\Atelier;
use App\Entity\Animations;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AtelierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Atelier::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->remove(Crud::PAGE_INDEX, Action::NEW)

        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
            return $action->setIcon('fa-solid fa-magnifying-glass')->setLabel(false);
        })

        ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
            return $action->setIcon('fa fa-edit')->setLabel(false);
        })
        ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
            return $action->setIcon('fa fa-trash')->setLabel(false);
        });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->showEntityActionsInlined()
            ->setEntityLabelInSingular('Atelier')
            ->setEntityLabelInPlural('Ateliers')

            ->setPageTitle('index', 'Ateliers')
            ->setPageTitle('new', 'Ajouter un atelier')
            ->setPageTitle('detail', 'Détail de l\'atelier')
            ->setPageTitle('edit', 'Modifier un atelier')
        ;
    }

    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id')
                ->hideOnForm()
                ->hideOnDetail()
                ->hideOnIndex(),
                AssociationField::new('users')
                ->hideOnIndex()
                ->setQueryBuilder(function (QueryBuilder $queryBuilder) {
                    $queryBuilder->select('u')
                        ->from(User::class, 'u')
                        ->orderBy('u.name', 'ASC');
                }),
                AssociationField::new('vin')
                ->hideOnIndex()
                ->setQueryBuilder(function (QueryBuilder $queryBuilder) {
                    $queryBuilder->select('v')
                        ->from(Vin::class, 'v')
                        ->orderBy('v.nom', 'ASC');
                }),
                AssociationField::new('cepage')
                ->hideOnIndex()
                ->setQueryBuilder(function (QueryBuilder $queryBuilder) {
                    $queryBuilder->select('c')
                        ->from(Cepage::class, 'c')
                        ->orderBy('c.type', 'ASC');
                }),

                AssociationField::new('animations')
                ->setQueryBuilder(function (QueryBuilder $queryBuilder) {
                    $queryBuilder->select('a')
                    ->from(Animations::class, 'a')
                    ->orderBy('a.nom', 'ASC');
                }),


            DateField::new('date'),
            TextField::new('horaire'),
            TextField::new('address')
            ->setLabel('Adresse')
            ->setSortable(false),

            IntegerField::new('place')
            ->setLabel('Nombre de Places')
            ->setSortable(false)
            ->setFormTypeOptions([
                'attr' => [
                    'min' => 1,
                ],
            ]),
            TextareaField::new('commentaire')
            ->setSortable(false)
        ];
    }
}
