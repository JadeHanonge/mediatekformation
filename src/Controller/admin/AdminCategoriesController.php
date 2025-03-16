<?php

namespace App\Controller\admin;

use App\Entity\Categorie;
use App\Entity\Formation;
use App\Form\CategorieType;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Interface\Constante;
use App\Repository\CategorieRepository;

class AdminCategoriesController extends AbstractController {
    /**
 * @var FormationRepository
 */
private $formationrepository;


/**
 *
 * @var CategorieRepository
 */
    private $categorieRepository;


/**
 * @param FormationRepository $repository
 */
public function __construct(FormationRepository $formationrepository, CategorieRepository $categorieRepository){
    $this->formationrepository = $formationrepository;
    $this->categorieRepository= $categorieRepository;
}

#[Route('/admin/categories', name: 'admin.categories')]
public function index(Request $request): Response {
    $formations = $this->formationrepository->findAllOrderBy('title', 'ASC');
    $categories = $this->categorieRepository->findAll();
    $categorie = new Categorie();
    $formCategorie = $this->createForm(CategorieType::class, $categorie);
    $formCategorie->handleRequest($request);
    $existingCategorie = $this->categorieRepository->findOneBy(['name'=> $categorie->getname()]);
    if($formCategorie->isSubmitted() && $formCategorie->isValid()){
        if(!$existingCategorie){
            $this->categorieRepository->add($categorie);
            return $this->redirectToRoute('admin.categories');
        }else{
            $this->addFlash(
                'notice',
                'Nom de catégorie déjà utilisé'
            );
        }
    }
    return $this->render("admin/admin.categories.html.twig", [
        'formations' => $formations,
        'categories' => $categories,
        'formcategorie' => $formCategorie->createView()
    ]);
}

#[Route('/admin/categories/suppr/{id}', name: 'admin.categorie.suppr')]
public function suppr(int $id): Response {
    $categorie = $this->categorieRepository->find($id);
    $categorieFormations = $this->formationrepository->findAllForOnePlaylist($id);
    if(empty($categorieFormations)){
        $this->categorieRepository->remove($categorie);
    }else{
        $this->addFlash(
            'notice',
            'Cette categorie ne peux pas etre supprimé car elle contients au moins une formation.'
        );
    }
    return $this->redirectToRoute('admin.categories');
}


// #[Route('/admin/categories/ajout', name: 'admin.categorie.ajout')]
// public function ajout(Request $request): Response {
//     $categorie = new Categorie();
//     $formCategorie = $this->createForm(CategorieType::class, $categorie);

//     $formCategorie->handleRequest($request);
//     if($formCategorie->isSubmitted() && $formCategorie->isValid()){
//         $this->categorieRepository->add($categorie);
//         return $this->redirectToRoute('admin.categories');
//     }
//     return $this->render("admin/admin.categories.html.twig", [
//         'categorie' => $categorie,
//         'formcategorie' => $formCategorie->createView()
//     ]);
// }

// #[Route('/admin/formations/tri/{champ}/{ordre}/{table}', name: 'admin.formations.sort')]
// public function sortAdmin($champ, $ordre, $table=""): Response{
//     $formations = $this->formationrepository->findAllOrderBy($champ, $ordre, $table);
//     $categories = $this->categorieRepository->findAll();
//     return $this->render(Constante::PAGE_FORMATIONS_ADMIN, [
//         Constante::FORMATIONS => $formations,
//         Constante::CATEGORIES => $categories
//     ]);
// }

#[Route('/admin/categories/recherche/{champ}/{table}', name: 'admin.categories.findallcontain')]
public function findAllContainAdmin($champ, Request $request, $table=""): Response{
    $valeur = $request->get("recherche");
    $formations = $this->formationrepository->findByContainValue($champ, $valeur, $table);
    $categories = $this->categorieRepository->findAll();
    return $this->render(Constante::PAGE_FORMATIONS_ADMIN, [
        Constante::FORMATIONS => $formations,
        Constante::CATEGORIES => $categories,
        Constante::VALEUR => $valeur,
        Constante::TABLE => $table
    ]);
}

}