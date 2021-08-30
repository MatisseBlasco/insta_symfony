<?php

namespace App\Controller;

use App\Entity\HashtagPost;
use App\Form\HashtagPostType;
use App\Repository\HashtagPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hashtag/post")
 */
class HashtagPostController extends AbstractController
{
    /**
     * @Route("/", name="hashtag_post_index", methods={"GET"})
     */
    public function index(HashtagPostRepository $hashtagPostRepository): Response
    {
        return $this->render('hashtag_post/index.html.twig', [
            'hashtag_posts' => $hashtagPostRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="hashtag_post_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hashtagPost = new HashtagPost();
        $form = $this->createForm(HashtagPostType::class, $hashtagPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hashtagPost);
            $entityManager->flush();

            return $this->redirectToRoute('hashtag_post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hashtag_post/new.html.twig', [
            'hashtag_post' => $hashtagPost,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="hashtag_post_show", methods={"GET"})
     */
    public function show(HashtagPost $hashtagPost): Response
    {
        return $this->render('hashtag_post/show.html.twig', [
            'hashtag_post' => $hashtagPost,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="hashtag_post_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HashtagPost $hashtagPost): Response
    {
        $form = $this->createForm(HashtagPostType::class, $hashtagPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hashtag_post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hashtag_post/edit.html.twig', [
            'hashtag_post' => $hashtagPost,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="hashtag_post_delete", methods={"POST"})
     */
    public function delete(Request $request, HashtagPost $hashtagPost): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hashtagPost->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hashtagPost);
            $entityManager->flush();
        }

        return $this->redirectToRoute('hashtag_post_index', [], Response::HTTP_SEE_OTHER);
    }
}
