<?php
namespace App\Controller;

use App\Interface\Constante;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of AccueilController
 *
 * @author emds
 */
class AccueilController extends AbstractController{

    /**
     * @var FormationRepository
     */
    private $repository;

    /**
     * @param FormationRepository $repository
     */
    public function __construct(FormationRepository $repository) {
        $this->repository = $repository;
    }

    #[Route('/', name: 'accueil')]
    public function index(): Response{
        $formations = $this->repository->findAllLasted(2);
        return $this->render(Constante::PAGE_ACCUEIL, [
            Constante::FORMATIONS => $formations
        ]);
    }

    #[Route('/cgu', name: 'cgu')]
    public function cgu(): Response{
        return $this->render(Constante::PAGE_CGU);
    }
}
