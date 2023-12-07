<?php

namespace App\Controller;

use App\Entity\Gite;
use App\Repository\GiteRepository;
use App\Repository\AdresseRepository;
use App\Repository\EquipementRepository;
use App\Repository\ServiceRepository;
use App\Model\RechercheGite;
use App\Form\RechercheGiteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(Request $request, GiteRepository $giteRepository): Response
    {
        $form = $this->createForm(RechercheGiteType::class, new RechercheGite());
        $form->handleRequest($request);

        $gites = $giteRepository->findAllWithRelations();     
    
        
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $queryBuilder = $giteRepository->SearchGite();

            if ($data->getVille()) {
                $queryBuilder->andWhere('a.ville = :ville')->setParameter('ville', $data->getVille());
            }

            if ($data->getDepartement()) {
                $queryBuilder->andWhere('a.departement = :departement')->setParameter('departement', $data->getDepartement());
            }
            if ($data->getRegion()) {
                $queryBuilder->andWhere('a.region = :region')->setParameter('region', $data->getRegion());
            }
            if ($data->getEquipements()) {
                $queryBuilder->andWhere('e.equipements = :equipements')->setParameter('equipements', $data->getEquipements());
            }
            if ($data->getServices()) {
                $queryBuilder->andWhere('s.services = :services')->setParameter('services', $data->getServices());
            }
        

            if ($data->getAnimauxacceptes() !== null) {
                $queryBuilder->andWhere('g.animauxacceptes = :animauxacceptes')->setParameter('animauxacceptes', $data->getanimauxacceptes());
            }

            $gites = $queryBuilder->getQuery()->getResult();

        }

        return $this->render('home/index.html.twig', [
            'gites' => $gites,
            'form' => $form->createView(),
        ]);
    }
}
