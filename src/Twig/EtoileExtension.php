<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class EtoileExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('nbEtoile', [$this, 'nbEtoiles']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('nbEtoile', [$this, 'nbEtoiles']),
        ];
    }

    public function nbEtoiles(string $nombre){

        //Affiche 5 etoiles vides si note = 0
        if ($nombre == "0") {
            $note = '<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>';
            return $note;
        }
        
        //Affiche 1/2 etoiles complete et le reste vide
        if (($nombre == "0,5")||($nombre == "0.5")) {
            $note = '<a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>';
            return $note;
        }
    
        //Affiche 1 etoile complete et le reste vide
        if ($nombre == "1") {
            $note = '<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>';
            return $note;
        }
        
        //Affiche 1 + 1/2 etoiles completes et le reste vide
        if (($nombre == "1,5")||($nombre == "1.5")) {
            $note = '<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>';
            return $note;
        }
    
        //Affiche 2 etoiles complete et le reste vide
        if ($nombre == "2") {
            $note = '<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>';
            return $note;
        }
        
        //Affiche 2 + 1/2 etoiles completes et le reste vide
        if (($nombre == "2,5")||($nombre == "2.5")) {
            $note = '<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>';
            return $note;
        }
    
        //Affiche 3 etoiles complete et le reste vide
        if ($nombre == "3") {
            $note = '<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>';
            return $note;
        }
        
        //Affiche 3 + 1/2 etoiles completes et le reste vide
        if (($nombre == "3,5")||($nombre == "3.5")) {
            $note = '<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>';
            return $note;
        }
    
        //Affiche 4 etoiles complete et le reste vide
        if ($nombre == "4") {
            $note = '<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>';
            return $note;
        }
        
        //Affiche 4 + 1/2 etoiles completes et le reste vide
        if (($nombre == "4,5")||($nombre == "4.5")){
            $note = '<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>';
            return $note;
        }
        
        //Affiche 5 etoiles complete et le reste vide
        if ($nombre == "5") {
            $note = '<a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>';

            return $note;
        }

    }
}
