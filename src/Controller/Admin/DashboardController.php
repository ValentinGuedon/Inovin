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
use App\Repository\UserRepository;
use App\Repository\VinRepository;
use App\Repository\BlogRepository;
use App\Repository\NoteRepository;
use App\Repository\AtelierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

class DashboardController extends AbstractDashboardController
{
    // private EntityManagerInterface $entityManager;
    private UserRepository $userRepository;
    private VinRepository $vinRepository;
    private BlogRepository $blogRepository;
    private NoteRepository $noteRepository;
    private AtelierRepository $atelierRepository;

    public function __construct(
        // EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        VinRepository $vinRepository,
        BlogRepository $blogRepository,
        NoteRepository $noteRepository,
        AtelierRepository $atelierRepository
    ) {
        // $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
        $this->vinRepository = $vinRepository;
        $this->blogRepository = $blogRepository;
        $this->noteRepository =  $noteRepository;
        $this->atelierRepository = $atelierRepository;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $totalUsers = $this->userRepository->getTotalUsersCount();
        $totalVins = $this->vinRepository->getTotalVinsCount();
        $totalArticles = $this->blogRepository->getTotalArticlesCount();
        $topRatedVins = $this->noteRepository->findTopRatedVins(3);
        $prochainAtelier = $this->atelierRepository->findProchainAtelier();

        return $this->render('admin/dashboard.html.twig', [
            'totalUsers' => $totalUsers,
            'totalVins' => $totalVins,
            'totalArticles' => $totalArticles,
            'topRatedVins' => $topRatedVins,
            'prochainAtelier' => $prochainAtelier,
        ]);
    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('css/admin.css');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tableau de bord')
            ->disableDarkMode()
            ->setFaviconPath('build\images\Favicon.179675a2.png');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');
        yield MenuItem::linkToUrl('Site Inovin', 'fa fa-reply-all', '/');

        yield MenuItem::section('Utilisateurs');
        yield MenuItem::subMenu('Utilisateurs', 'fas fa-user')->setSubItems([
            MenuItem::linkToCrud('Voir Utilisateurs', 'fas fa-eye', User::class),
        ]);

        yield MenuItem::section('Vins');
        yield MenuItem::subMenu('Vins', 'fas fa-wine-bottle')->setSubItems([
            MenuItem::linkToCrud('Créer un Vin', 'fas fa-plus', Vin::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Vins', 'fas fa-eye', Vin::class),
        ]);

        yield MenuItem::subMenu('Cepages', 'fas fa-wine-glass')->setSubItems([
            MenuItem::linkToCrud('Créer un Cépage', 'fas fa-plus', Cepage::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Cépages', 'fas fa-eye', Cepage::class),
        ]);

        yield MenuItem::section('Animations');
        yield MenuItem::subMenu('Animations', 'fas fa-bullhorn')->setSubItems([
            MenuItem::linkToCrud('Créer une Animation', 'fas fa-plus', Animations::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Animations', 'fas fa-eye', Animations::class),
        ]);

        yield MenuItem::subMenu('Ateliers', 'fas fa-map')->setSubItems([
            MenuItem::linkToCrud('Créer un Atelier', 'fas fa-plus', Atelier::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Ateliers', 'fas fa-eye', Atelier::class),
        ]);

        yield MenuItem::subMenu('Recettes', 'fas fa-eye-dropper')->setSubItems([
            MenuItem::linkToCrud('Voir Recette', 'fas fa-eye', Recette::class),
        ]);

        yield MenuItem::section('Communauté');
        yield MenuItem::subMenu('Blog', 'fas fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('Créer Article', 'fas fa-plus', Blog::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Article', 'fas fa-eye', Blog::class),
        ]);

        yield MenuItem::subMenu('FAQ', 'fas fa-question')->setSubItems([
            MenuItem::linkToCrud('Créer Question', 'fas fa-plus', Faq::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Question', 'fas fa-eye', Faq::class),
        ]);
    }
}
