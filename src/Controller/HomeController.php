<?php

namespace App\Controller;

use App\Entity\User;
use Composer\Util\Http\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route("/")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        if (!$this->isGranted('ROLE_USER') && !$this->isGranted('ROLE_ADMIN') && !$this->isGranted('ROLE_INVESTER')) {
            return $this->redirectToRoute('app_login');
        }
        return $this->render('home/index.html.twig', array());
    }

    /**
     * @Route("/login", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(AuthenticationUtils $authenticationUtils): \Symfony\Component\HttpFoundation\Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(Request $request)
    {
        $session = $request->getSession();
        $session->clear();
        return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("/subscribe", name="subscribe")
     */
    public function renderSubscribe()
    {
        return $this->render('subscribe.html.twig');
    }

    /**
     * @Route("/my-projects", name="client-projects")
     */
    public function fetchCurrentUserProjects(Request $request)
    {
        if ($this->isGranted('ROLE_USER')) {
            $currentUser = $this->get('security.token_storage')->getToken()->getUser();
            $projects = $currentUser->getProjects();
            return $this->render('project/pro-projects.html.twig', array('projects' => $projects));
        }
    }


}
