<?php

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="index_panier")
     */
    public function index(FilmRepository $filmsRepo, SessionInterface $session): Response
    {
        $lesGenres = $filmsRepo->findByGenre(); //Pour menu déroulant "Genres"
        $lesNationalites = $filmsRepo->findByNationalite();  //Pour menu déroulant "Nationalités"

        $panier = $session->get('panier', []);
        $panierAvecDonnees = [];

        foreach($panier as $id => $quantite)
        {
            $panierAvecDonnees[] = [
                'film' => $filmsRepo->find($id),
                'qte' => $quantite
            ];
        }
        #dd($panierAvecDonnees);

        return $this->render('panier/index.html.twig', [
            'items' => $panierAvecDonnees,
            'lesGenres' => $lesGenres,
            'lesNationalites' => $lesNationalites,
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="add_panier")
     */
    public function add($id, SessionInterface $session, FilmRepository $filmsRepo): Response
    {

        $panier = $session->get('panier', []);
        if (!empty($panier[$id]))   //Est ce que la case avec cet id est déja présente ?
        {
            $panier[$id]++;
        }
        else                        // L'id n'est pas présent
        {
            $panier[$id] = 1;
        }
        $session->set('panier', $panier);
        #dd($panier);
        $this->addFLash('panier', "Produit ajouté au panier");

        return $this->redirectToRoute("film_single", ['id' => $id]);
    }

    public function nbProdPanier(SessionInterface $session)
    {

        $panier = $session->get('panier',[]);
        $total = 0;
        foreach($panier as $id => $quantite)
        {
            $total = $total + $quantite;
        }
        return $this->render('panier/nbProdPanier.html.twig', ['nb' => $total]);
    }

    /**
     * @Route("/panier/plus/{id}", name="plus_panier")
     */
    public function plus($id, SessionInterface $session): Response
    {

        $panier = $session->get('panier', []);
        if (!empty($panier[$id]))   //Est ce que la case avec cet id est déja présente ?
        {
            $panier[$id]++;
        }
        $session->set('panier', $panier);
        #dd($panier);
        $this->addFLash('panier', "Quantité ajouté au panier");

        return $this->redirectToRoute("index_panier");
    }

    /**
     * @Route("/panier/moins/{id}", name="moins_panier")
     */
    public function moins($id, SessionInterface $session): Response
    {

        $panier = $session->get('panier', []);
        if (!empty($panier[$id]))   //Est ce que la case avec cet id est déja présente ?
        {
            $panier[$id]--;
            if($panier[$id]==0){
                unset($panier[$id]);
            }
        }
        $session->set('panier', $panier);
        #dd($panier);
        $this->addFLash('panier', "Quantité diminué au panier");

        return $this->redirectToRoute("index_panier");
    }

    /**
     * @Route("/panier/remove/{id}", name="remove_panier")
     */
    public function remove($id, SessionInterface $session): Response
    {

        $panier = $session->get('panier', []);
        if (!empty($panier[$id]))   //Est ce que la case avec cet id est déja présente ?
        {
            unset($panier[$id]);
        }
        $session->set('panier', $panier);
        #dd($panier);
        $this->addFLash('panier', "Quantité diminué au panier");

        return $this->redirectToRoute("index_panier");
    }

}
