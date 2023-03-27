<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationShoeController extends AbstractController
{
    #[Route('/presentation/shoe', name: 'app_presentation_shoe')]
    public function index(): Response
    {
        return $this->render('presentation_shoe/index.html.twig', [
            'controller_name' => 'PresentationShoeController',
        ]);
    }
}
