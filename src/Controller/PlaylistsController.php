<?php
namespace App\Controller;

use App\Interface\Constante;
use App\Repository\CategorieRepository;
use App\Repository\FormationRepository;
use App\Repository\PlaylistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of PlaylistsController
 *
 * @author jade
 */
class PlaylistsController extends AbstractController {

    /**
     *
     * @var PlaylistRepository
     */
    private $playlistRepository;

    /**
     *
     * @var FormationRepository
     */
    private $formationRepository;

    /**
     *
     * @var CategorieRepository
     */
    private $categorieRepository;

    public function __construct(PlaylistRepository $playlistRepository,
        CategorieRepository $categorieRepository,
        FormationRepository $formationRespository) {
        $this->playlistRepository = $playlistRepository;
        $this->categorieRepository = $categorieRepository;
        $this->formationRepository = $formationRespository;
    }

    /**
     * @Route("/playlists", name="playlists")
     * @return Response
     */
    #[Route('/playlists', name: 'playlists')]
    public function index(): Response{
        $playlists = $this->playlistRepository->findAllOrderByName('ASC');
        $categories = $this->categorieRepository->findAll();
        return $this->render(Constante::PAGE_PLAYLISTS, [
            Constante::PLAYLISTS => $playlists,
            Constante::CATEGORIES => $categories
        ]);
    }

    #[Route('/playlists/tri/{champ}/{ordre}', name: 'playlists.sort')]
    public function sort($champ, $ordre): Response{
        switch($champ){
            case "name":
                $playlists = $this->playlistRepository->findAllOrderByName($ordre);
                break;
            case "formations":
                $playlists = $this->playlistRepository->findAllOrderByFormations($ordre);
                break;
        }
        $categories = $this->categorieRepository->findAll();
        return $this->render(Constante::PAGE_PLAYLISTS, [
            Constante::PLAYLISTS => $playlists,
            Constante::CATEGORIES => $categories
        ]);
    }

    #[Route('/playlists/recherche/{champ}/{table}', name: 'playlists.findallcontain')]
    public function findAllContain($champ, Request $request, $table=""): Response{
        $valeur = $request->get("recherche");
        $playlists = $this->playlistRepository->findByContainValue($champ, $valeur, $table);
        $categories = $this->categorieRepository->findAll();
        return $this->render(Constante::PAGE_PLAYLISTS, [
            Constante::PLAYLISTS => $playlists,
            Constante::CATEGORIES => $categories,
            Constante::VALEUR => $valeur,
            Constante::TABLE => $table
        ]);
    }

    #[Route('/playlists/playlist/{id}', name: 'playlists.showone')]
    public function showOne($id): Response{
        $playlist = $this->playlistRepository->find($id);
        $playlistCategories = $this->categorieRepository->findAllForOnePlaylist($id);
        $playlistFormations = $this->formationRepository->findAllForOnePlaylist($id);
        return $this->render(Constante::PAGE_PLAYLIST, [
            Constante::PLAYLIST => $playlist,
            Constante::PLAYLIST_CATEGORIES => $playlistCategories,
            Constante::PLAYLIST_FORMATIONS => $playlistFormations
        ]);
    }

}
