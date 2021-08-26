<?php

namespace App\Controller;

use App\Entity\NotifComments;
use App\Form\NotifCommentsType;
use App\Repository\NotifCommentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/notif/comments")
 */
class NotifCommentsController extends AbstractController
{
    /**
     * @Route("/", name="notif_comments_index", methods={"GET"})
     */
    public function index(NotifCommentsRepository $notifCommentsRepository): Response
    {
        return $this->render('notif_comments/index.html.twig', [
            'notif_comments' => $notifCommentsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="notif_comments_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $notifComment = new NotifComments();
        $form = $this->createForm(NotifCommentsType::class, $notifComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($notifComment);
            $entityManager->flush();

            return $this->redirectToRoute('notif_comments_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('notif_comments/new.html.twig', [
            'notif_comment' => $notifComment,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="notif_comments_show", methods={"GET"})
     */
    public function show(NotifComments $notifComment): Response
    {
        return $this->render('notif_comments/show.html.twig', [
            'notif_comment' => $notifComment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="notif_comments_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, NotifComments $notifComment): Response
    {
        $form = $this->createForm(NotifCommentsType::class, $notifComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('notif_comments_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('notif_comments/edit.html.twig', [
            'notif_comment' => $notifComment,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="notif_comments_delete", methods={"POST"})
     */
    public function delete(Request $request, NotifComments $notifComment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$notifComment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($notifComment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('notif_comments_index', [], Response::HTTP_SEE_OTHER);
    }
}
