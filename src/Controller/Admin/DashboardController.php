<?php

namespace App\Controller\Admin;
use App\Entity\User;
use App\Entity\Enseignant;
use App\Entity\Cours;
use App\Entity\Contact;
use App\Entity\Instrument;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My Project Name');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-User', User::class);
        yield MenuItem::linkToCrud('Enseignant', 'fas fa-Enseignant', Enseignant::class);
        yield MenuItem::linkToCrud('Cours', 'fas fa-cours', Cours::class);
        yield MenuItem::linkToCrud('Instruments', 'fas fa-', Instrument::class);
        yield MenuItem::linkToCrud('Messages', 'fas fa-', Contact::class);


    }
}
