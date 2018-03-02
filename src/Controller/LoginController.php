<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class LoginController
 * @package App\Controller
 */
class LoginController extends Controller {

	/**
	 * @Route("/login", name="login")
	 */
	public function login(Request $request, AuthenticationUtils $authenticationUtils) : Response {
		$errors = $authenticationUtils->getLastAuthenticationError();
		$lastUsername = $authenticationUtils->getLastUsername();

		return $this->render('User/login.html.twig', [
			'errors' => $errors,
			'username' => $lastUsername
		]);
	}

	/**
	 * @Route("/logout", name="logout")
	 */
	public function logout() : Response {}

}
