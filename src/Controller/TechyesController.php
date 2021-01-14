<?php

namespace App\Controller;

use App\Entity\Techyes;
use App\Form\TechyesType;
use App\Repository\TechyesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/techyes")
 */
class TechyesController extends AbstractController
{
    /**
     * @Route("/", name="techyes_index", methods={"GET"})
     */
    public function index(TechyesRepository $techyesRepository): Response
    {
        return $this->render('techyes/index.html.twig', [
            'techyes' => $techyesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="techyes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $techye = new Techyes();
        $form = $this->createForm(TechyesType::class, $techye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($techye);
            $entityManager->flush();

            return $this->redirectToRoute('techyes_index');
        }

        return $this->render('techyes/new.html.twig', [
            'techye' => $techye,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="techyes_show", methods={"GET"})
     */
    public function show(Techyes $techye): Response
    {
        return $this->render('techyes/show.html.twig', [
            'techye' => $techye,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="techyes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Techyes $techye): Response
    {
        $form = $this->createForm(TechyesType::class, $techye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('techyes_index');
        }

        return $this->render('techyes/edit.html.twig', [
            'techye' => $techye,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="techyes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Techyes $techye): Response
    {
        if ($this->isCsrfTokenValid('delete'.$techye->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($techye);
            $entityManager->flush();
        }

        return $this->redirectToRoute('techyes_index');
    }
}
