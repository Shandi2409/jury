<?php

namespace App\Controller;

use App\Entity\MarqueDeVoiture;
use App\Form\MarqueDeVoitureType;
use App\MesServices\ImageService;
use App\Repository\MarqueDeVoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("voiture/marque")
 */
class MarqueController extends AbstractController
{
    /**
     * @Route("/liste", name="liste_marque", methods={"GET"})
     */
    public function index(MarqueDeVoitureRepository $marqueDeVoitureRepository): Response
    {
        return $this->render('client/marque_de_voiture/index.html.twig', [
            'marque_de_voitures' => $marqueDeVoitureRepository->findAll(),
        ]);
    }


    /**
     * @Route("/detail/{id}", name="detail_marque", methods={"GET"})
     */
    public function show(MarqueDeVoiture $marqueDeVoiture): Response
    {
        return $this->render('client/marque_de_voiture/show.html.twig', [
            'marque_de_voiture' => $marqueDeVoiture,
        ]);
    }
  
}
