<?php

namespace App\Controller\Admin;

use App\Entity\Vin;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VinCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vin::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW)
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm()
            ->hideOnIndex(),
            TextField::new('nom'),
            ImageField::new('image')
            ->setUploadDir('public/uploads/images/posters')
            ->setBasePath('uploads/images/posters')
            ->setSortable(false),
            IntegerField::new('millesime'),
            TextField::new('region'),
            TextareaField::new('description')
            ->setSortable(false),


            TextField::new('couleur'),
            TextField::new('limpidite'),
            TextField::new('fluidite'),
            TextField::new('persistance'),
            TextField::new('structure'),
            TextField::new('matiere'),

            ArrayField::new('arome'),

            IntegerField::new('brillance'),
            IntegerField::new('intensite'),
            IntegerField::new('douceur'),
            IntegerField::new('alcool'),

            NumberField::new('degreAlcool'),
            NumberField::new('prix'),
        ];
    }
}
