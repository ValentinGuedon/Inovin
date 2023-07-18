<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blog::class;
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
            DateField::new('date')
            ->setFormTypeOptions([
                'data' => new \DateTime(),
            ]),
            TextField::new('title')
            ->setLabel('Titre'),
            TextField::new('description')
                ->setSortable(false),

            TextEditorField::new('text')
                ->setLabel('Article')
                ->setNumOfRows(15)
                ->setTrixEditorConfig([
                'blockAttributes' => [
                    // Define the HTML attributes for style
                    'default' => ['tagName' => 'blogParagraph'],
                    'heading1' => ['tagName' => 'blogHeader'],
                    'quote' => ['tagName' => 'blogQuote'],
                    'href' => ['tagName' => 'blogLink'],
                    'code' => ['tagName' => 'blogCode'],
                    'bullet' => ['tagName' => 'blogList'],
                    'numberList' => ['tagName' => 'bloglistNumber'],
                    ]
                ])
                ->setSortable(false),


            ImageField::new('image')
                ->setUploadDir('public/uploads/images/posters')
                // setBasePath permet d'afficher les images dans l'index
                ->setBasePath('uploads/images/posters')
                ->setSortable(false),

            // ImageField::new('posterFile')->setUploadDir('public/uploads/images/posters'),
        ];
    }
}
