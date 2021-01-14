<?php

namespace App\Controller;

use App\Entity\Djs;
use App\Form\DjsType;
use App\Repository\DjsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/djs")
 */
class DjsController extends AbstractController
{
    /**
     * @Route("/", name="djs_index", methods={"GET"})
     */
    public function index(DjsRepository $djsRepository): Response
    {
        return $this->render('djs/index.html.twig', [
            'djs' => $djsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="djs_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dj = new Djs();
        $form = $this->createForm(DjsType::class, $dj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dj);
            $entityManager->flush();

            return $this->redirectToRoute('djs_index');
        }

        return $this->render('djs/new.html.twig', [
            'dj' => $dj,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="djs_show", methods={"GET"})
     */
    public function show(Djs $dj): Response
    {
        return $this->render('djs/show.html.twig', [
            'dj' => $dj,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="djs_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Djs $dj): Response
    {
        $form = $this->createForm(DjsType::class, $dj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('djs_index');
        }

        return $this->render('djs/edit.html.twig', [
            'dj' => $dj,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="djs_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Djs $dj): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dj->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dj);
            $entityManager->flush();
        }

        return $this->redirectToRoute('djs_index');
    }
}
