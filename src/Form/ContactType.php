<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Repository\FilmRepository;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('objet', ChoiceType::class, [
            'choices' => [
                'Demande de renseignements' => 'Demande de renseignements',
                'Service après-vente' => 'Service après-vente'
                ],
            'placeholder' => 'Choisir un motif',
            ])
            ->add('nom', TextType::class, [
                'attr' => array(
                    'placeholder' => 'Entrez votre nom'
            )])
            ->add('prenom', TextType::class, [
                'label' => 'Votre prénom',
                'attr' => array(
                    'placeholder' => 'Entrez votre prénom'
            )])
            ->add('mail', TextType::class, [
                'label' => 'Votre e-mail',
                'attr' => array(
                    'placeholder' => 'Entrez votre e-mail'
            )])
            ->add('demande', TextareaType::class, [
                'attr' => array(
                    'placeholder' => 'Saisissez votre demande'
            )])
            ->add('date', DateType::class, [
                'label' => 'Date du jour :',
                'format' => 'dd MM yyyy'
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
