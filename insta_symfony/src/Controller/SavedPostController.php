<?php

namespace App\Controller;

use App\Entity\SavedPost;
use App\Form\SavedPostType;
use App\Repository\SavedPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/saved/post")
 */
class SavedPostController extends AbstractController
{
    /**
     * @Route("/", name="saved_post_index", methods={"GET"})
     */
    public function index(SavedPostRepository $savedPostRepository): Response
    {
        return $this->render('saved_post/index.html.twig', [
            'saved_posts' => $savedPostRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="saved_post_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $savedPost = new SavedPost();
        $form = $this->createForm(SavedPostType::class, $savedPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($savedPost);
            $entityManager->flush();

            return $this->redirectToRoute('saved_post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('saved_post/new.html.twig', [
            'saved_post' => $savedPost,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="saved_post_show", methods={"GET"})
     */
    public function show(SavedPost $savedPost): Response
    {
        return $this->render('saved_post/show.html.twig', [
            'saved_post' => $savedPost,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="saved_post_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SavedPost $savedPost): Response
    {
        $form = $this->createForm(SavedPostType::class, $savedPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('saved_post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('saved_post/edit.html.twig', [
            'saved_post' => $savedPost,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="saved_post_delete", methods={"POST"})
     */
    public function delete(Request $request, SavedPost $savedPost): Response
    {
        if ($this->isCsrfTokenValid('delete'.$savedPost->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($savedPost);
            $entityManager->flush();
        }

        return $this->redirectToRoute('saved_post_index', [], Response::HTTP_SEE_OTHER);
    }
}
