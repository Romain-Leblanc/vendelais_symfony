<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\FilmRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact_index")
     */
    public function index(Request $request, \Swift_Mailer $mailer, FilmRepository $filmsRepo): Response
    {
        $unContact = new Contact();
        $form = $this->createForm(ContactType::class, $unContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($unContact);
            $entityManager->flush();

            //$this->addFlash('okcontact', 'Votre demande a été enregistrée. Nous vous répondrons rapidement.');

            $mail = new \Swift_Message();
            $mail->setSubject("Demande d'infos")
                ->setFrom(['contact@cinema-vendelais.com' => 'Cinéma Vendelais'])
                ->setTo($unContact->getMail())
                ->setBody(
                    $this->render('contact/mail.html.twig',
                    ['unContact' => $unContact,]), 'text/html');
            if ($mailer->send($mail))
            {
                $this->addFlash('okcontact', 'Votre demande a bien été envoyée. Nous vous répondrons rapidement');
            }
            else
            {
                $this->addFlash('okcontact', 'Une erreur est survenue, veuillez recommencer !');
            }

            return $this->redirectToRoute('contact_index');
        }

        $lesGenres = $filmsRepo->findByGenre();;
        $lesNationalites = $filmsRepo->findByNationalite();

        return $this->render('contact/index.html.twig', [
            'formContact' => $form->createView(),
            'lesGenres' => $lesGenres,
            'lesNationalites' => $lesNationalites,
        ]);
    }
}