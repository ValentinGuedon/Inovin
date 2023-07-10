<?php

namespace App\Controller\Admin;

use App\Entity\Vin;
use App\Entity\User;
use App\Entity\Cepage;
use App\Entity\Atelier;
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
        ->remove(Crud::PAGE_INDEX, Action::NEW);
    }


    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id')
                ->hideOnForm()
                ->hideOnIndex(),
            DateField::new('date'),
            IntegerField::new('place')
            ->setLabel('Nombre de Places')
            ->setSortable(false),
            TextareaField::new('commentaire')
            ->setSortable(false),
            TextField::new('address')
            ->setLabel('Adresse')
            ->setSortable(false),
            TextField::new('horaire'),
            AssociationField::new('vin')
            ->setQueryBuilder(function (QueryBuilder $queryBuilder) {
                $queryBuilder->select('v')
                    ->from(Vin::class, 'v')
                    ->orderBy('v.nom', 'ASC');
            }),
            AssociationField::new('users')
            ->setQueryBuilder(function (QueryBuilder $queryBuilder) {
                $queryBuilder->select('u')
                    ->from(User::class, 'u')
                    ->orderBy('u.name', 'ASC');
            }),
            AssociationField::new('cepage')
            ->setQueryBuilder(function (QueryBuilder $queryBuilder) {
                $queryBuilder->select('c')
                    ->from(Cepage::class, 'c')
                    ->orderBy('c.type', 'ASC');
            })
        ];
    }
}
