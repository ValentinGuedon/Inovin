<?php

namespace App\Controller\Admin;

use App\Entity\Animations;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AnimationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animations::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->showEntityActionsInlined()
            ->setEntityLabelInSingular('Animation')
            ->setEntityLabelInPlural('Animations')

            ->setPageTitle('index', 'Animations')
            ->setPageTitle('new', 'Ajouter une animation')
            ->setPageTitle('detail', 'Détail de l\'animation')
            ->setPageTitle('edit', 'Modifier une animation')
        ;
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

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm()
            ->hideOnDetail()
            ->hideOnIndex(),
            TextField::new('nom'),
            ImageField::new('image')
            ->setUploadDir('public/uploads/images/posters')
            ->setBasePath('uploads/images/posters')
            ->setSortable(false),
            IntegerField::new('prix')
            ->setFormTypeOptions([
                'attr' => [
                    'min' => 0,
                ],
            ]),
            TextareaField::new('resume')
            ->setLabel('Résumé'),
            TextareaField::new('description'),
            SlugField::new('slug')
            ->setTargetFieldName('nom')
            ->hideOnDetail()
            ->hideOnIndex(),
        ];
    }
}
