<?php

namespace App\Controller;

use App\Entity\Medias;
use App\Form\MediasType;
use App\Repository\MediasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/medias")
 */
class MediasController extends AbstractController
{
    /**
     * @Route("/", name="medias_index", methods={"GET"})
     */
    public function index(MediasRepository $mediasRepository): Response
    {
        return $this->render('medias/index.html.twig', [
            'medias' => $mediasRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="medias_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $media = new Medias();
        $form = $this->createForm(MediasType::class, $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($media);
            $entityManager->flush();

            return $this->redirectToRoute('medias_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medias/new.html.twig', [
            'media' => $media,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="medias_show", methods={"GET"})
     */
    public function show(Medias $media): Response
    {
        return $this->render('medias/show.html.twig', [
            'media' => $media,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="medias_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Medias $media): Response
    {
        $form = $this->createForm(MediasType::class, $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medias_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('medias/edit.html.twig', [
            'media' => $media,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="medias_delete", methods={"POST"})
     */
    public function delete(Request $request, Medias $media): Response
    {
        if ($this->isCsrfTokenValid('delete'.$media->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($media);
            $entityManager->flush();
        }

        return $this->redirectToRoute('medias_index', [], Response::HTTP_SEE_OTHER);
    }
}
