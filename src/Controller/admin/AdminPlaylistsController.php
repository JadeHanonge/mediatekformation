<?php
namespace App\Controller\admin;

use App\Entity\Playlist;
use App\Form\PlaylistType;
use App\Interface\Constante;
use App\Repository\CategorieRepository;
use App\Repository\FormationRepository;
use App\Repository\PlaylistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

/**
 * Description of PlaylistsController
 *
 * @author emds
 */
class AdminPlaylistsController extends AbstractController {

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
    #[Route('admin/playlists', name: 'admin.playlists')]
    public function index(): Response{
        $playlists = $this->playlistRepository->findAllOrderByName('ASC');
        $categories = $this->categorieRepository->findAll();
        return $this->render(Constante::PAGE_PLAYLISTS_ADMIN, [
            Constante::PLAYLISTS => $playlists,
            Constante::CATEGORIES => $categories
        ]);
    }

    #[Route('admin/playlists/tri/{champ}/{ordre}', name: 'admin.playlists.sort')]
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
        return $this->render(Constante::PAGE_PLAYLISTS_ADMIN, [
            Constante::PLAYLISTS => $playlists,
            Constante::CATEGORIES => $categories
        ]);
    }

    #[Route('admin/playlists/recherche/{champ}/{table}', name: 'admin.playlists.findallcontain')]
    public function findAllContain($champ, Request $request, $table=""): Response{
        $valeur = $request->get("recherche");
        $playlists = $this->playlistRepository->findByContainValue($champ, $valeur, $table);
        $categories = $this->categorieRepository->findAll();
        return $this->render(Constante::PAGE_PLAYLISTS_ADMIN, [
            Constante::PLAYLISTS => $playlists,
            Constante::CATEGORIES => $categories,
            Constante::VALEUR => $valeur,
            Constante::TABLE => $table
        ]);
    }

    #[Route('admin/playlists/playlist/{id}', name: 'admin.playlists.showone')]
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

    #[Route('/admin/playlists/suppr/{id}', name: 'admin.playlist.suppr')]
    public function suppr(int $id, SessionInterface $session): Response {
        $playlist = $this->playlistRepository->find($id);
        $playlistFormations = $this->formationRepository->findAllForOnePlaylist($id);
        if(empty($playlistFormations)){
            $this->playlistRepository->remove($playlist);
        }else{
            $this->addFlash(
                'notice',
                'Cette playlist ne peux pas etre supprimé car elle contients au moins une playlist.'
            );
        }
        return $this->redirectToRoute('admin.playlists');
    }

    #[Route('/admin/playlists/edit/{id}', name: 'admin.playlist.edit')]
    public function edit(int $id, Request $request): Response {
        $playlist = $this->playlistRepository->find($id);
        $formPlaylist = $this->createForm(PlaylistType::class, $playlist);
        $playlistFormations = $this->formationRepository->findAllForOnePlaylist($id);

        $formPlaylist->handleRequest($request);
        if($formPlaylist->isSubmitted() && $formPlaylist->isValid()){
            $this->playlistRepository->add($playlist);
            return $this->redirectToRoute('admin.playlists');
        }
        return $this->render("admin/admin.playlist.edit.html.twig", [
            'playlist' => $playlist,
            'playlistformations' => $playlistFormations,
            'formplaylist' => $formPlaylist->createView()
        ]);
    }

    #[Route('/admin/playlist/ajout', name: 'admin.playlist.ajout')]
    public function ajout(Request $request): Response {
        $playlist = new Playlist();
        $formPlaylist = $this->createForm(PlaylistType::class, $playlist);

        $formPlaylist->handleRequest($request);
        if($formPlaylist->isSubmitted() && $formPlaylist->isValid()){
            $this->playlistRepository->add($playlist);
            return $this->redirectToRoute('admin.playlists');
        }
        return $this->render("admin/admin.playlist.ajout.html.twig", [
            'playlist' => $playlist,
            'formplaylist' => $formPlaylist->createView()
        ]);
    }

}
