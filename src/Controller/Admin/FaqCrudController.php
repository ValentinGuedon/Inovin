<?php

namespace App\Controller\Admin;

use App\Entity\Faq;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class FaqCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Faq::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->remove(Crud::PAGE_INDEX, Action::NEW)

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
            TextField::new('question')
                ->setSortable(false),
            TextareaField::new('answer')
                ->setLabel('Réponse')
                ->setSortable(false),
        ];
    }
}
