<?php

namespace App\Controller;

use App\Entity\HashtagPosts;
use App\Form\HashtagPostsType;
use App\Repository\HashtagPostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hashtag/posts")
 */
class HashtagPostsController extends AbstractController
{
    /**
     * @Route("/", name="hashtag_posts_index", methods={"GET"})
     */
    public function index(HashtagPostsRepository $hashtagPostsRepository): Response
    {
        return $this->render('hashtag_posts/index.html.twig', [
            'hashtag_posts' => $hashtagPostsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="hashtag_posts_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hashtagPost = new HashtagPosts();
        $form = $this->createForm(HashtagPostsType::class, $hashtagPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hashtagPost);
            $entityManager->flush();

            return $this->redirectToRoute('hashtag_posts_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hashtag_posts/new.html.twig', [
            'hashtag_post' => $hashtagPost,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="hashtag_posts_show", methods={"GET"})
     */
    public function show(HashtagPosts $hashtagPost): Response
    {
        return $this->render('hashtag_posts/show.html.twig', [
            'hashtag_post' => $hashtagPost,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="hashtag_posts_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HashtagPosts $hashtagPost): Response
    {
        $form = $this->createForm(HashtagPostsType::class, $hashtagPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hashtag_posts_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hashtag_posts/edit.html.twig', [
            'hashtag_post' => $hashtagPost,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="hashtag_posts_delete", methods={"POST"})
     */
    public function delete(Request $request, HashtagPosts $hashtagPost): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hashtagPost->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hashtagPost);
            $entityManager->flush();
        }

        return $this->redirectToRoute('hashtag_posts_index', [], Response::HTTP_SEE_OTHER);
    }
}
