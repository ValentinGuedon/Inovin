<?php

namespace App\Controller\Admin;

use App\Entity\Vin;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
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
        ->remove(Crud::PAGE_INDEX, Action::NEW);
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
            IntegerField::new('millesime')
            ->setLabel('Millésime'),
            TextField::new('region')
            ->setLabel('Région'),
            TextareaField::new('description')
            ->setSortable(false),


            TextField::new('couleur'),
            TextField::new('limpidite')
            ->setLabel('Limpidité'),
            TextField::new('fluidite')
            ->setLabel('Fluidité'),
            TextField::new('persistance'),
            TextField::new('structure'),
            TextField::new('matiere')
            ->setLabel('Matière'),

            ChoiceField::new('arome')
            ->setLabel('Arômes')
            ->setChoices([
                'Fruite' => 'Fruité',
                'Animal' => 'Animal',
                'Epice' => 'Epicé',
                'Floral' => 'Floral',
                'Végétal' => 'Végétal',
                'Marin' => 'Marin',
            ])
            ->allowMultipleChoices(true),

            IntegerField::new('brillance'),
            IntegerField::new('intensite')
            ->setLabel('Intensité'),
            IntegerField::new('douceur'),
            IntegerField::new('alcool')
            ->setLabel('Alcool Ressenti'),

            NumberField::new('degreAlcool')
            ->setLabel('Degré'),
            NumberField::new('prix'),
            BooleanField::new('star', 'Mettre en avant'),
            SlugField::new('slug')
            ->setTargetFieldName('nom')
            ->hideOnIndex(),

        ];
    }
}
