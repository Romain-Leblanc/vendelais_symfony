<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\FilmRepository;
use App\Repository\CommandeRepository;
use App\Entity\Commande;
use App\Entity\LigneCommandeFilm;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande_index")
     */
    public function index(CommandeRepository $commandeRepo, FilmRepository $filmsRepo): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if($this->IsGranted('ROLE_ADMIN'))
        {
            $lesCommandes = $commandeRepo->findAll();
            $lesGenres = $filmsRepo->findByGenre();
            $lesNationalites = $filmsRepo->findByNationalite();

        }
        else
        {
            $lesCommandes = $commandeRepo->findByUtilisateur($this->getUser()->getId());
            $lesGenres = $filmsRepo->findByGenre();
            $lesNationalites = $filmsRepo->findByNationalite();

        }        
        
        return $this->render('commande/index.html.twig', [
            'lesCommandes' => $lesCommandes,
            'lesGenres' => $lesGenres,
            'lesNationalites' => $lesNationalites,
        ]);
    }

    /**
     * @Route("/commande/add", name="commande_add")
     */
    public function add(SessionInterface $session, FilmRepository $filmsRepo): Response
    {
        $entityManager = $this ->getDoctrine()->getManager();
        $Cde = new Commande();
        $Cde->setDate(new \DateTime());
        $Cde->setUnUtilisateur($this->getUser());
        
        $panier = $session->get('panier', []);

        foreach($panier as $id => $quantite)
        {
            $uneLC = new LigneCommandeFilm();
            $uneLC->setQuantite($quantite);
            $unFilm=$filmsRepo->find($id);
            $uneLC->setUnFilm($unFilm);
            $Cde->addLigneCommandeFilm($uneLC);
        }

        $entityManager->persist($Cde);
        $entityManager->flush();
        $session->set('panier', []);

        return $this->redirectToRoute('commande_add'); 
    }

    /**
     * @Route("/commande/{id}", name="commande_show")
     */
    public function show($id, CommandeRepository $commandeRepo, FilmRepository $filmsRepo): Response
    {
        $uneCde = $commandeRepo->find($id);
        $lesGenres = $filmsRepo->findByGenre();
        $lesNationalites = $filmsRepo->findByNationalite();

        return $this->render('commande/show.html.twig', [
            'uneCde' => $uneCde,
            'lesGenres' => $lesGenres,
            'lesNationalites' => $lesNationalites,
        ]);
    }
}