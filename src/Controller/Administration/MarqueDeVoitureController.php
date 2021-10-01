<?php

namespace App\Controller\Administration;

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
 * @Route("/marque/de/voiture")
 */
class MarqueDeVoitureController extends AbstractController
{
    /**
     * @Route("/", name="marque_de_voiture_index", methods={"GET"})
     */
    public function index(MarqueDeVoitureRepository $marqueDeVoitureRepository): Response
    {
        return $this->render('administration/marque_de_voiture/index.html.twig', [
            'marque_de_voitures' => $marqueDeVoitureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="marque_de_voiture_new", methods={"GET","POST"})
     */
    public function new(Request $request, ImageService $imageService): Response
    {
        $marqueDeVoiture = new MarqueDeVoiture();
        $form = $this->createForm(MarqueDeVoitureType::class, $marqueDeVoiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dataImage = $form->get('images')->getData();

            $imageService->sauvegarderImage($marqueDeVoiture, $dataImage);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($marqueDeVoiture);
            $entityManager->flush();

            return $this->redirectToRoute('marque_de_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('administration/marque_de_voiture/new.html.twig', [
            'marque_de_voiture' => $marqueDeVoiture,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="marque_de_voiture_show", methods={"GET"})
     */
    public function show(MarqueDeVoiture $marqueDeVoiture): Response
    {
        return $this->render('administration/marque_de_voiture/show.html.twig', [
            'marque_de_voiture' => $marqueDeVoiture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="marque_de_voiture_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MarqueDeVoiture $marqueDeVoiture, ImageService $imageService): Response
    {
        $form = $this->createForm(MarqueDeVoitureType::class, $marqueDeVoiture);
        $form->handleRequest($request);
        
        $ancienneImage = $marqueDeVoiture->getImages();

        if ($form->isSubmitted() && $form->isValid()) {

            $dataImage = $form->get('images')->getData();
            $imageService->sauvegarderImage($marqueDeVoiture, $dataImage);

            $imageService->supprimerImage($ancienneImage);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('marque_de_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('administration/marque_de_voiture/edit.html.twig', [
            'marque_de_voiture' => $marqueDeVoiture,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="marque_de_voiture_delete", methods={"POST"})
     */
    public function delete(Request $request, MarqueDeVoiture $marqueDeVoiture, ImageService $imageService): Response
    {
        if ($this->isCsrfTokenValid('delete' . $marqueDeVoiture->getId(), $request->request->get('_token'))) {

            $imageService->supprimerImage($marqueDeVoiture->getImages());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($marqueDeVoiture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('marque_de_voiture_index', [], Response::HTTP_SEE_OTHER);
    }
}
