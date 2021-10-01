<?php

namespace App\Controller;

use App\Entity\DetailVoiture;
use App\Entity\MarqueDeVoiture;
use App\Form\MarqueDeVoitureType;
use App\MesServices\ImageService;
use App\Repository\MarqueDeVoitureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("voiture/detail")
 */
class VoitureController extends AbstractController
{
    /**
     * @Route("/liste/{id}", name="liste_voiture", methods={"GET"})
     */
    public function index(MarqueDeVoitureRepository $marqueDeVoitureRepository, int $id ): Response
    {
        return $this->render('client/liste_de_voiture/index.html.twig', [
            'marque_de_voiture' => $marqueDeVoitureRepository->find($id),
        ]);
    }


    /**
     * @Route("/detail/{id}", name="detail_voiture", methods={"GET"})
     */
    public function show(DetailVoiture $detailVoiture): Response
    {
        return $this->render('client/liste_de_voiture/show.html.twig', [
            'detail_voiture' => $detailVoiture,
        ]);
    }
  
}
