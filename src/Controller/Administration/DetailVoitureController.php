<?php

namespace App\Controller\Administration;

use App\Entity\DetailVoiture;
use App\Form\DetailVoitureType;
use App\MesServices\ImageService;
use App\Repository\DetailVoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/detail/voiture")
 */
class DetailVoitureController extends AbstractController
{
    /**
     * @Route("/", name="detail_voiture_index", methods={"GET"})
     */
    public function index(DetailVoitureRepository $detailVoitureRepository): Response
    {
        return $this->render('administration/detail_voiture/index.html.twig', [
            'detail_voitures' => $detailVoitureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="detail_voiture_new", methods={"GET","POST"})
     */
    public function new(Request $request, ImageService $imageService): Response
    {
        $detailVoiture = new DetailVoiture();
        $form = $this->createForm(DetailVoitureType::class, $detailVoiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $dataImage = $form->get('images')->getData();

            $imageService->sauvegarderImage($detailVoiture, $dataImage);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($detailVoiture);
            $entityManager->flush();

            return $this->redirectToRoute('detail_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('administration/detail_voiture/new.html.twig', [
            'detail_voiture' => $detailVoiture,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="detail_voiture_show", methods={"GET"})
     */
    public function show(DetailVoiture $detailVoiture): Response
    {
        return $this->render('administration/detail_voiture/show.html.twig', [
            'detail_voiture' => $detailVoiture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="detail_voiture_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DetailVoiture $detailVoiture, ImageService $imageService): Response
    {
        $form = $this->createForm(DetailVoitureType::class, $detailVoiture);
        $form->handleRequest($request);

        $ancienneImage = $detailVoiture->getImages();

        if ($form->isSubmitted() && $form->isValid()) { 

            $dataImage = $form->get('images')->getData();
            $imageService->sauvegarderImage($detailVoiture, $dataImage);

            $imageService->supprimerImage($ancienneImage);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detail_voiture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('administration/detail_voiture/edit.html.twig', [
            'detail_voiture' => $detailVoiture,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="detail_voiture_delete", methods={"POST"})
     */
    public function delete(Request $request, DetailVoiture $detailVoiture, ImageService $imageService): Response
    {
        if ($this->isCsrfTokenValid('delete'.$detailVoiture->getId(), $request->request->get('_token'))) {

            $imageService->supprimerImage($detailVoiture->getImages());


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($detailVoiture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('detail_voiture_index', [], Response::HTTP_SEE_OTHER);
    }
}
