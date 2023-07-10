<?php

namespace App\Controller\Admin;

use App\Entity\Animations;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
            IntegerField::new('prix'),
            TextareaField::new('resume'),
            TextareaField::new('description'),
            SlugField::new('slug')
            ->setTargetFieldName('nom')
            ->hideOnIndex(),
        ];
    }
}
