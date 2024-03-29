<?php

namespace App\Controller;

use App\Entity\Hashtag;
use App\Form\HashtagType;
use App\Repository\HashtagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hashtag")
 */
class HashtagController extends AbstractController
{
    /**
     * @Route("/", name="hashtag_index", methods={"GET"})
     */
    public function index(HashtagRepository $hashtagRepository): Response
    {
        return $this->render('hashtag/index.html.twig', [
            'hashtags' => $hashtagRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="hashtag_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hashtag = new Hashtag();
        $form = $this->createForm(HashtagType::class, $hashtag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hashtag);
            $entityManager->flush();

            return $this->redirectToRoute('hashtag_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hashtag/new.html.twig', [
            'hashtag' => $hashtag,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="hashtag_show", methods={"GET"})
     */
    public function show(Hashtag $hashtag): Response
    {
        return $this->render('hashtag/show.html.twig', [
            'hashtag' => $hashtag,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="hashtag_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Hashtag $hashtag): Response
    {
        $form = $this->createForm(HashtagType::class, $hashtag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hashtag_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hashtag/edit.html.twig', [
            'hashtag' => $hashtag,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="hashtag_delete", methods={"POST"})
     */
    public function delete(Request $request, Hashtag $hashtag): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hashtag->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hashtag);
            $entityManager->flush();
        }

        return $this->redirectToRoute('hashtag_index', [], Response::HTTP_SEE_OTHER);
    }
}
