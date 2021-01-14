<?php

namespace App\Controller;

use App\Entity\HardTechyes;
use App\Form\HardTechyesType;
use App\Repository\HardTechyesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hard/techyes")
 */
class HardTechyesController extends AbstractController
{
    /**
     * @Route("/", name="hard_techyes_index", methods={"GET"})
     */
    public function index(HardTechyesRepository $hardTechyesRepository): Response
    {
        return $this->render('hard_techyes/index.html.twig', [
            'hard_techyes' => $hardTechyesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="hard_techyes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hardTechye = new HardTechyes();
        $form = $this->createForm(HardTechyesType::class, $hardTechye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hardTechye);
            $entityManager->flush();

            return $this->redirectToRoute('hard_techyes_index');
        }

        return $this->render('hard_techyes/new.html.twig', [
            'hard_techye' => $hardTechye,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hard_techyes_show", methods={"GET"})
     */
    public function show(HardTechyes $hardTechye): Response
    {
        return $this->render('hard_techyes/show.html.twig', [
            'hard_techye' => $hardTechye,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="hard_techyes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HardTechyes $hardTechye): Response
    {
        $form = $this->createForm(HardTechyesType::class, $hardTechye);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hard_techyes_index');
        }

        return $this->render('hard_techyes/edit.html.twig', [
            'hard_techye' => $hardTechye,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hard_techyes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, HardTechyes $hardTechye): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hardTechye->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hardTechye);
            $entityManager->flush();
        }

        return $this->redirectToRoute('hard_techyes_index');
    }
}
