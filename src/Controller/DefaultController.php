<?php

namespace App\Controller;
use App\Entity\Film;
use App\Repository\FilmRepository;
use App\Controller\FilmController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\InputBag;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="accueil_film")
     */
    public function index(FilmRepository $filmsRepo): Response
    {
        $lesFilms = $filmsRepo->findAll();
        $unFilm = $filmsRepo->findBy(['id' => '1']); 
        $lesGenres = $filmsRepo->findByGenre();
        $lesNationalites = $filmsRepo->findByNationalite();

        return $this->render('default/index.html.twig',
        [
            'lesFilms' => $lesFilms,
            'unFilm' => $unFilm,
            'lesGenres' => $lesGenres,
            'lesNationalites' => $lesNationalites,
        ]);
    }    

    public function searchBarAction(){
        $form = $this->createFormBuilder(null)
                ->add('search', TextType::class, [
                    'attr' => ['placeholder' => 'Recherche', 'class' => 'textInput']
                    ])
                ->add('submit', SubmitType::class, [
                    'label' => 'Go',
                    'attr' => ['class' => 'textSubmit']
                    ])
                ->getForm();

        return $this->render('search/searchBar.html.twig',
        [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/search", name="film_search")
     * @param Request $request
     */
    public function handleSearch(Request $request, FilmRepository $filmsRepo)
    {
        $filmsearch = $request->request->get('form')['search'];

        $leFilm = $filmsRepo->findByNameSearch($filmsearch);
        $lesGenres = $filmsRepo->findByGenre(); //Pour menu déroulant "Genres"
        $lesNationalites = $filmsRepo->findByNationalite();  //Pour menu déroulant "Nationalités"

        return $this->render('search/search.html.twig', [
            'filmSearchNom' => $filmsearch,
            'filmsearch' => $leFilm,
            'lesGenres' => $lesGenres,
            'lesNationalites' => $lesNationalites,
        ]);

    }
}
