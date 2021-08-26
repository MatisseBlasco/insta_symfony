<?php

namespace App\Controller;

use App\Entity\SavedPosts;
use App\Form\SavedPostsType;
use App\Repository\SavedPostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/saved/posts")
 */
class SavedPostsController extends AbstractController
{
    /**
     * @Route("/", name="saved_posts_index", methods={"GET"})
     */
    public function index(SavedPostsRepository $savedPostsRepository): Response
    {
        return $this->render('saved_posts/index.html.twig', [
            'saved_posts' => $savedPostsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="saved_posts_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $savedPost = new SavedPosts();
        $form = $this->createForm(SavedPostsType::class, $savedPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($savedPost);
            $entityManager->flush();

            return $this->redirectToRoute('saved_posts_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('saved_posts/new.html.twig', [
            'saved_post' => $savedPost,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="saved_posts_show", methods={"GET"})
     */
    public function show(SavedPosts $savedPost): Response
    {
        return $this->render('saved_posts/show.html.twig', [
            'saved_post' => $savedPost,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="saved_posts_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SavedPosts $savedPost): Response
    {
        $form = $this->createForm(SavedPostsType::class, $savedPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('saved_posts_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('saved_posts/edit.html.twig', [
            'saved_post' => $savedPost,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="saved_posts_delete", methods={"POST"})
     */
    public function delete(Request $request, SavedPosts $savedPost): Response
    {
        if ($this->isCsrfTokenValid('delete'.$savedPost->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($savedPost);
            $entityManager->flush();
        }

        return $this->redirectToRoute('saved_posts_index', [], Response::HTTP_SEE_OTHER);
    }
}
