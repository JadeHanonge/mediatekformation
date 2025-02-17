<?php

namespace App\Controller\admin;

use App\Form\FormationType;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AdminFormationsController extends AbstractController {
    /**
 * @var FormationRepository
 */
private $repository;

/**
 * @param FormationRepository $repository
 */
public function __construct(FormationRepository $repository){
    $this->repository = $repository;
}

#[Route('/admin', name: 'admin.formations')]
public function index(): Response {
    $formations = $this->repository->findAllOrderBy('title', 'ASC');
    return $this->render("admin/admin.formations.html.twig", [
        'formations' => $formations
    ]);
}

#[Route('/admin/suppr/{id}', name: 'admin.formation.suppr')]
public function suppr(int $id): Response {
    $formation = $this->repository->find($id);
    $this->repository->remove($formation);
    return $this->redirectToRoute('admin.formations');
}

#[Route('/admin/edit/{id}', name: 'admin.formation.edit')]
public function edit(int $id, Request $request): Response {
    $formation = $this->repository->find($id);
    $formFormation = $this->createForm(FormationType::class, $formation);

    $formFormation->handleRequest($request);
    if($formFormation->isSubmitted() && $formFormation->isValid()){
        $this->repository->add($formation);
        return $this->redirectToRoute('admin.formations');
    }
    return $this->render("admin/admin.formation.edit.html.twig", [
        'formation' => $formation,
        'formformation' => $formFormation->createView()
    ]);
}

// #[Route('/admin/edit/{id}', name: 'admin.voyage.edit')]
// public function edit(int $id, Request $request): Response {
//     $visite = $this->repository->find($id);
//     $formVisite = $this->createForm(FormationType::class, $visite);

//     $formVisite->handleRequest($request);
//     if($formVisite->isSubmitted() && $formVisite->isValid()){
//         $this->repository->add($visite);
//         return $this->redirectToRoute('admin.voyages');
//     }
//     return $this->render("admin/admin.voyage.edit.html.twig", [
//         'visite'=> $visite,
//         'formvisite' => $formVisite->createView()
//     ]);
// }

// #[Route('/admin/ajout', name: 'admin.voyage.ajout')]
// public function ajout(Request $request): Response {
//     $visite = new Visite();
//     $formVisite = $this->createForm(VisiteType::class, $visite);

//     $formVisite->handleRequest($request);
//     if($formVisite->isSubmitted() && $formVisite->isValid()){
//         $this->repository->add($visite);
//         return $this->redirectToRoute('admin.voyages');
//     }
//     return $this->render("admin/admin.voyage.ajout.html.twig", [
//         'visite'=> $visite,
//         'formvisite' => $formVisite->createView()
//     ]);
// }
}