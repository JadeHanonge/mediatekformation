<?php

namespace App\Controller\admin;

use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Interface\Constante;
use App\Repository\CategorieRepository;

/**
 * Controleur des formations en admin
 *
 * @author jade
 */
class AdminFormationsController extends AbstractController {
    /**
 * @var FormationRepository
 */
private $repository;


/**
 *
 * @var CategorieRepository
 */
    private $categorieRepository;

/**
 * @param FormationRepository $repository
 */
public function __construct(FormationRepository $repository, CategorieRepository $categorieRepository){
    $this->repository = $repository;
    $this->categorieRepository= $categorieRepository;
}

#[Route('/admin', name: 'admin.formations')]
public function index(): Response {
    $formations = $this->repository->findAllOrderBy('title', 'ASC');
    $categories = $this->categorieRepository->findAll();
    return $this->render("admin/admin.formations.html.twig", [
        'formations' => $formations,
        'categories' => $categories
    ]);
}

#[Route('/admin/formations/suppr/{id}', name: 'admin.formation.suppr')]
public function suppr(int $id): Response {
    $formation = $this->repository->find($id);
    $this->repository->remove($formation);
    return $this->redirectToRoute('admin.formations');
}

#[Route('/admin/formations/edit/{id}', name: 'admin.formation.edit')]
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

#[Route('/admin/formations/ajout', name: 'admin.formation.ajout')]
public function ajout(Request $request): Response {
    $formation = new Formation();
    $formFormation = $this->createForm(FormationType::class, $formation);

    $formFormation->handleRequest($request);
    if($formFormation->isSubmitted() && $formFormation->isValid()){
        $this->repository->add($formation);
        return $this->redirectToRoute('admin.formations');
    }
    return $this->render("admin/admin.formation.ajout.html.twig", [
        'formation' => $formation,
        'formformation' => $formFormation->createView()
    ]);
}

#[Route('/admin/formations/tri/{champ}/{ordre}/{table}', name: 'admin.formations.sort')]
public function sortAdmin($champ, $ordre, $table=""): Response{
    $formations = $this->repository->findAllOrderBy($champ, $ordre, $table);
    $categories = $this->categorieRepository->findAll();
    return $this->render(Constante::PAGE_FORMATIONS_ADMIN, [
        Constante::FORMATIONS => $formations,
        Constante::CATEGORIES => $categories
    ]);
}

#[Route('/admin/formations/recherche/{champ}/{table}', name: 'admin.formations.findallcontain')]
public function findAllContainAdmin($champ, Request $request, $table=""): Response{
    $valeur = $request->get("recherche");
    $formations = $this->repository->findByContainValue($champ, $valeur, $table);
    $categories = $this->categorieRepository->findAll();
    return $this->render(Constante::PAGE_FORMATIONS_ADMIN, [
        Constante::FORMATIONS => $formations,
        Constante::CATEGORIES => $categories,
        Constante::VALEUR => $valeur,
        Constante::TABLE => $table
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