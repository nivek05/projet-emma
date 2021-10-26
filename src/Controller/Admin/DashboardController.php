<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Category;
use App\Entity\Content;
use App\Entity\Contact;
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
        return parent::index();
         // redirect to some CRUD controller
         //$routeBuilder = $this->get(AdminUrlGenerator::class);

         //return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());
 
         // you can also redirect to different pages depending on the current user
         //if ('jane' === $this->getUser()->getUsername()) {
         //    return $this->redirect('...');
         //}
 
         // you can also render some template to display a proper Dashboard
         // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
         //return $this->render('easyAdmin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin');
    }

    public function configureMenuItems(): iterable
    {   
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('USER', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('CATEGORIES', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('CONTENT', 'fas fa-list', Content::class);
        yield MenuItem::linkToCrud('CONTACT', 'fas fa-list', Contact::class);
    }
}
