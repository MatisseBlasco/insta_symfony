<?php

namespace App\Controller;

use App\Entity\Followers;
use App\Form\FollowersType;
use App\Repository\FollowersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/followers")
 */
class FollowersController extends AbstractController
{
    /**
     * @Route("/", name="followers_index", methods={"GET"})
     */
    public function index(FollowersRepository $followersRepository): Response
    {
        return $this->render('followers/index.html.twig', [
            'followers' => $followersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="followers_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $follower = new Followers();
        $form = $this->createForm(FollowersType::class, $follower);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($follower);
            $entityManager->flush();

            return $this->redirectToRoute('followers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('followers/new.html.twig', [
            'follower' => $follower,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="followers_show", methods={"GET"})
     */
    public function show(Followers $follower): Response
    {
        return $this->render('followers/show.html.twig', [
            'follower' => $follower,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="followers_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Followers $follower): Response
    {
        $form = $this->createForm(FollowersType::class, $follower);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('followers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('followers/edit.html.twig', [
            'follower' => $follower,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="followers_delete", methods={"POST"})
     */
    public function delete(Request $request, Followers $follower): Response
    {
        if ($this->isCsrfTokenValid('delete'.$follower->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($follower);
            $entityManager->flush();
        }

        return $this->redirectToRoute('followers_index', [], Response::HTTP_SEE_OTHER);
    }
}
