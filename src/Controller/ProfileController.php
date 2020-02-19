<?php
declare(strict_types=1);

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="app.profile")
     * @return Response
     */
    public function profile(): Response
    {
        return $this->render('User/profile.html.twig', []);
    }
}