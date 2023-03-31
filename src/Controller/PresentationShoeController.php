<?php

namespace App\Controller;

use App\Entity\Shoes;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PresentationShoeController extends AbstractController
{
    #[Route('/{id}/shoes', name: 'app_presentation_shoe')]
    public function index(Shoes $shoes): Response
    {
        return $this->render('presentation_shoe/index.html.twig', [
            'controller_name' => 'PresentationShoeController',
            'shoe' => $shoes
        ]);
    }
}
