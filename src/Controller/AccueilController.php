<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/realisations', name: 'realisations')]
    public function afficherRealisations(): Response
    {
        return $this->render('static/realisations.html.twig');
    }

    #[Route('/cv', name: 'cv')]
    public function afficherCv(): Response
    {
        return $this->render('static/cv.html.twig');
    }
    #[Route('/veille', name: 'veille')]
    public function afficherVeille(): Response
    {
        return $this->render('static/veille.html.twig');
    }
}
