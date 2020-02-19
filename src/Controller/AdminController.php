<?php
declare(strict_types=1);

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AdminController
 * @package App\Controller
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin.dashboard")
     * @return Response
     */
    public function dashboard(): Response
    {
        return $this->render('Admin/dashboard.html.twig', []);
    }
}