<?php

namespace App\Controller\Admin;

use App\Entity\Vin;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class VinCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vin::class;
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
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm()
            ->hideOnIndex(),
            TextField::new('nom'),

            ChoiceField::new('couleur')->setChoices([
                'Rouge' => 'rouge',
                'Blanc' => 'blanc',
                'Rosé' => 'rose',
                'Jaune' => 'jaune',
                'Autre' => 'autre',
            ])
            ->hideOnIndex(),

            IntegerField::new('millesime')
            ->setLabel('Millésime')
            ->setFormTypeOptions([
                'attr' => [
                    'min' => 1,
                ],
            ]),
            TextField::new('region')
            ->setLabel('Région'),
            TextField::new('limpidite')
            ->setLabel('Limpidité')
            ->hideOnIndex(),
            TextField::new('fluidite')
            ->setLabel('Fluidité')
            ->hideOnIndex(),
            TextField::new('persistance')
            ->hideOnIndex(),
            TextField::new('structure')
            ->hideOnIndex(),
            TextField::new('matiere')
            ->setLabel('Matière')
            ->hideOnIndex(),

            ArrayField::new('arome')
            ->hideOnIndex(),

            IntegerField::new('brillance')
            ->hideOnIndex(),
            IntegerField::new('intensite')
            ->setLabel('Intensité')
            ->hideOnIndex(),
            IntegerField::new('douceur')
            ->hideOnIndex(),
            IntegerField::new('alcool')
            ->setLabel('Alcool Ressenti')
            ->hideOnIndex(),

            NumberField::new('degreAlcool')
            ->setLabel('Degré'),
            NumberField::new('prix'),
            BooleanField::new('star', 'Mettre en avant'),

            ImageField::new('image')
            ->setUploadDir('public/uploads/images/posters')
            ->setBasePath('uploads/images/posters')
            ->setSortable(false),

            TextareaField::new('description')
            ->setSortable(false),
        ];
    }
}
