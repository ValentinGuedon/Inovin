<?php

namespace App\Controller\Admin;

use App\Entity\Faq;
use App\Entity\Vin;
use App\Entity\Blog;
use App\Entity\User;
use App\Entity\Cepage;
use App\Entity\Atelier;
use App\Entity\Recette;
use App\Entity\Animations;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    private AdminUrlGenerator $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $url = $this->adminUrlGenerator
        ->setController(AtelierCrudController::class)
        ->generateUrl();

         return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tableau de bord')
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Site Inovin', 'fa fa-home', '/');

        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::subMenu('Utilisateurs', 'fas fa-user')->setSubItems([
            MenuItem::linkToCrud('Voir Utilisateurs', 'fas fa-eye', User::class)
        ]);

        yield MenuItem::subMenu('Vins', 'fas fa-wine-bottle')->setSubItems([
            MenuItem::linkToCrud('Créer un Vin', 'fas fa-plus', Vin::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Vins', 'fas fa-eye', Vin::class)
        ]);

        yield MenuItem::subMenu('Cepages', 'fas fa-wine-glass')->setSubItems([
            MenuItem::linkToCrud('Créer un Cépage', 'fas fa-plus', Cepage::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Cépages', 'fas fa-eye', Cepage::class)
        ]);

        yield MenuItem::subMenu('Animations', 'fas fa-bullhorn')->setSubItems([
            MenuItem::linkToCrud('Créer une Animation', 'fas fa-plus', Animations::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Animations', 'fas fa-eye', Animations::class)
        ]);

        yield MenuItem::subMenu('Ateliers', 'fas fa-map')->setSubItems([
            MenuItem::linkToCrud('Créer un Atelier', 'fas fa-plus', Atelier::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Ateliers', 'fas fa-eye', Atelier::class)

        ]);

        yield MenuItem::subMenu('Blog', 'fas fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('Créer Article', 'fas fa-plus', Blog::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Article', 'fas fa-eye', Blog::class)
        ]);

        yield MenuItem::subMenu('FAQ', 'fas fa-question')->setSubItems([
            MenuItem::linkToCrud('Créer Question', 'fas fa-plus', Faq::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Question', 'fas fa-eye', Faq::class)
        ]);

        yield MenuItem::subMenu('Recettes', 'fas fa-eye-dropper')->setSubItems([
            MenuItem::linkToCrud('Voir Recette', 'fas fa-eye', Recette::class)
        ]);
    }
}
