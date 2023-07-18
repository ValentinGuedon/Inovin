<?php

namespace App\Controller\Admin;

use App\Entity\Vin;
use App\Entity\Cepage;
use Doctrine\ORM\QueryBuilder;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
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
            ->setEntityLabelInSingular('Vin')
            ->setEntityLabelInPlural('Vins')
            ->setPageTitle('index', 'Vins')
            ->setPageTitle('new', 'Ajouter un vin')
            ->setPageTitle('detail', 'Détail du vin')
            ->setPageTitle('edit', 'Modifier un vin')

        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm()
            ->hideOnDetail()
            ->hideOnIndex(),

            TextField::new('nom'),

            TextareaField::new('description')
            ->setSortable(false),

            ImageField::new('image')
            ->setUploadDir('public/uploads/images/posters')
            ->setBasePath('uploads/images/posters')
            ->setSortable(false),

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

            AssociationField::new('cepages')
            ->hideOnForm()
            ->hideOnIndex()
            ->hideOnDetail()
            ->setQueryBuilder(function (QueryBuilder $queryBuilder) {
                $queryBuilder->select('c')
                    ->from(Cepage::class, 'c')
                    ->orderBy('c.type', 'ASC');
            }),
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
            ->allowMultipleChoices(true)
            ->hideOnIndex(),

            IntegerField::new('brillance')
            ->hideOnIndex()
            ->setFormTypeOptions([
                'attr' => [
                    'min' => 0,
                    'max' => 10,
                ],
            ]),
            IntegerField::new('intensite')
            ->setLabel('Intensité')
            ->hideOnIndex()
            ->setFormTypeOptions([
                'attr' => [
                    'min' => 0,
                    'max' => 10,
                ],
            ]),
            IntegerField::new('douceur')
            ->hideOnIndex()
            ->setFormTypeOptions([
                'attr' => [
                    'min' => 0,
                    'max' => 10,
                ],
            ]),
            IntegerField::new('alcool')
            ->setLabel('Alcool Ressenti')
            ->hideOnIndex()
            ->setFormTypeOptions([
                'attr' => [
                    'min' => 0,
                    'max' => 10,
                ],
            ]),
            NumberField::new('degreAlcool')
            ->setLabel('Degré'),
            NumberField::new('prix'),
            BooleanField::new('star', 'Mettre en avant'),

            SlugField::new('slug')
            ->setTargetFieldName('nom')
            ->hideOnDetail()
            ->hideOnIndex(),


        ];
    }
}
