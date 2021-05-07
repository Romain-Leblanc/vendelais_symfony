<?php

namespace App\Controller;
use App\Entity\Film;
use App\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\DefaultController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\TwigFilter;
use Twig\TwigFunction;
use Symfony\Component\HttpFoundation\InputBag;

class FilmController extends AbstractController
{
    /**
     * @Route("/film", name="film_index")
     */
    public function index(FilmRepository $filmsRepo): Response
    {
        $lesFilms = $filmsRepo->findAll();

        return $this->render('film/index.html.twig', [
            'unFilmGenre' => $unFilmGenre,
            'lesFilms' => $lesFilms,
        ]);
    }

    /**
     * @Route("/genre/{genre}", name="film_genre", methods={"GET"})
     */
    public function genre($genre, FilmRepository $filmsRepo): Response
    {
        if ($genre=='*')
        {
            $unFilmGenre = $filmsRepo->findAll();
        }
        else
        {
            $unFilmGenre = $filmsRepo->findBy(['genreFilm' => $genre]);
        }

        $lesGenres = $filmsRepo->findByGenre(); //Pour menu déroulant "Genres"
        $lesNationalites = $filmsRepo->findByNationalite();  //Pour menu déroulant "Nationalités"
        $lesFilms = $filmsRepo->findAll();

        return $this->render('film/genre.html.twig', [
            'unFilmGenre' => $unFilmGenre,
            'lesFilms' => $lesFilms,
            'lesGenres' => $lesGenres,
            'lesNationalites' => $lesNationalites,
            'genre' => $genre,
        ]);
    }

    /**
     * @Route("/natio/{natio}", name="film_natio", methods={"GET"})
     */
    public function natio($natio, FilmRepository $filmsRepo): Response
    {
        $lesGenres = $filmsRepo->findByGenre(); //Pour menu déroulant "Genres"
        $lesNationalites = $filmsRepo->findByNationalite();  //Pour menu déroulant "Nationalités"

        $unFilmNatio = $filmsRepo->findBy(['nationaliteFilm' => $natio]);
        $lesFilms = $filmsRepo->findAll();
        //dd($unFilmGenre);

        return $this->render('film/natio.html.twig', [
            'unFilmNatio' => $unFilmNatio,
            'lesFilms' => $lesFilms,
            'lesGenres' => $lesGenres,
            'lesNationalites' => $lesNationalites,
            'natio' => $natio,
        ]);
    }

    /**
     * @Route("/film/{id}", name="film_single", methods={"GET"})
     */
    public function single($id, FilmRepository $filmsRepo): Response
    {
        $lesGenres = $filmsRepo->findByGenre(); //Pour menu déroulant "Genres"
        $lesNationalites = $filmsRepo->findByNationalite();  //Pour menu déroulant "Nationalités"
        $lesFilms = $filmsRepo->findAll();
        $unFilmSeul = $filmsRepo->find($id);
        //dd($unFilmSeul);
        return $this->render('film/detail.html.twig', [
            'lesGenres' => $lesGenres,
            'lesNationalites' => $lesNationalites,
            'unFilmSeul' => $unFilmSeul,
            'lesFilms' => $lesFilms,
        ]);
    }

    /**
     * @Route("/liste", name="film_liste")
     */
    public function liste(FilmRepository $filmsRepo): Response
    {
        $lesGenres = $filmsRepo->findByGenre(); //Pour menu déroulant "Genres"
        $lesNationalites = $filmsRepo->findByNationalite();  //Pour menu déroulant "Nationalités"
        $lesFilms = $filmsRepo->findAll();
        $nbFilms = $filmsRepo->findByCountFilm();
        //dd($nbFilms);

        return $this->render('liste.html.twig', [
            'lesGenres' => $lesGenres,
            'nb' => $nbFilms,
            'lesNationalites' => $lesNationalites,
            'lesFilmsListes' => $lesFilms,
        ]);
    }
}
