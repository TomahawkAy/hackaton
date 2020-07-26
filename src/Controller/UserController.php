<?php

namespace App\Controller;

use App\Entity\Invester;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/all", name="user")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/new-professional", name="createUser")
     */
    public function createProfessional()
    {

    }

    /**
     * @Route("/new-invester", name="newInvester")
     * @param Request $request
     * @throws \Exception
     */
    public function newInvester(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        if ($request->isXmlHttpRequest()) {
            $user = new User();
            $user->setCreatedAt(new \DateTime('now'));
            $user->setUpdatedAt(new \DateTime('now'));
            $user->setFullName($request->request->get('fullName'));
            $user->setBirthDate(new \DateTime($request->request->get('birthDate')));
            $user->setEmail($request->request->get('email'));
            $user->setLogin($request->request->get('login'));
            $user->setPassword($request->request->get('password'));
            $user->addRole("ROLE_INVESTER");
            $user->setIsActive(false);
            $manager->persist($user);
            $manager->flush();
            return new JsonResponse(array('operation' => 'success'));
        }
        return $this->redirectToRoute('newInvester');

    }

}
