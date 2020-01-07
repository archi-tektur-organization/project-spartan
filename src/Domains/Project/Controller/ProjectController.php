<?php declare(strict_types=1);

namespace App\Domains\Project\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    /**
     * @Route("/dashboard", name="project_dashboard")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('@Project/dashboard.twig');
    }

    /**
     * @Route("/login", name="project_login")
     * @return Response
     */
    public function login(): Response
    {
        return $this->render('@Account/security/login.html.twig');
    }
}
