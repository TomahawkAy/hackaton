<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UtilitiesController extends AbstractController
{
    /**
     * @Route("/utilities", name="utilities")
     */
    public function index()
    {
        return $this->render('utilities/index.html.twig', [
            'controller_name' => 'UtilitiesController',
        ]);
    }
}
