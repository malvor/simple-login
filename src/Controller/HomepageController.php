<?php

namespace App\Controller;

use \Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends Controller
{


    /**
     * @Route(
     *     "/",
     *     name="home"
     * )
     */
    public function homepage()
    {

        return $this->render('Homepage/homepage.html.twig', []);
    }

}