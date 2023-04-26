<?php

namespace App\Controller;

use App\Entity\Fidele;
use App\Form\FideleType;
use App\Repository\FideleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fidele')]
class FideleController extends AbstractController
{
    #[Route('/', name: 'app_fidele_index', methods: ['GET'])]
    public function index(FideleRepository $fideleRepository): Response
    {
        return $this->render('fidele/index.html.twig', [
            'fideles' => $fideleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_fidele_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FideleRepository $fideleRepository): Response
    {
        $fidele = new Fidele();
        $form = $this->createForm(FideleType::class, $fidele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fideleRepository->save($fidele, true);

            return $this->redirectToRoute('app_fidele_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fidele/new.html.twig', [
            'fidele' => $fidele,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fidele_show', methods: ['GET'])]
    public function show(Fidele $fidele): Response
    {
        return $this->render('fidele/show.html.twig', [
            'fidele' => $fidele,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fidele_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fidele $fidele, FideleRepository $fideleRepository): Response
    {
        $form = $this->createForm(FideleType::class, $fidele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fideleRepository->save($fidele, true);

            return $this->redirectToRoute('app_fidele_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fidele/edit.html.twig', [
            'fidele' => $fidele,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fidele_delete', methods: ['POST'])]
    public function delete(Request $request, Fidele $fidele, FideleRepository $fideleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fidele->getId(), $request->request->get('_token'))) {
            $fideleRepository->remove($fidele, true);
        }

        return $this->redirectToRoute('app_fidele_index', [], Response::HTTP_SEE_OTHER);
    }
}
