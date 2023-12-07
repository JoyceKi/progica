<?php

namespace App\Controller;

use App\Entity\Gite;
use App\Repository\GiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(GiteRepository $giteRepository): Response
    {
        $gites = $giteRepository->findAllWithRelations();

        return $this->render('home/index.html.twig', [
            'gites' => $gites,
        ]);
    }
}
