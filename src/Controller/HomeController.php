<?php

namespace App\Controller;

use App\Entity\Shoes;
use App\Form\SearchType;
use App\Repository\ShoesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ShoesRepository $shoesRepository, Request $request,): Response
    {
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);

        $orderBy ='desc';
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $orderBy = $data['orderBy'] ?? 'desc';
        } else {
            $orderBy = $request->query->get('orderBy', 'desc');
        }

        $shoes = $shoesRepository->findByExampleField($data ?? [], $orderBy);

        return $this->render('home/index.html.twig', [
            'shoes' => $shoes,
            'search_form' => $form,
        ]);
    }
}