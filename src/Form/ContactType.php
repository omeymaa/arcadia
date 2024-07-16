<?php

namespace App\Form;

use App\DTO\ContactDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ['empty_data' => '', 'label' => 'Prénom'])
            ->add('lastname', TextType::class, ['empty_data' => '', 'label' => 'Nom'])
            ->add('email', EmailType::class, ['empty_data' => '', 'label' => 'E-mail'])
            ->add('subject', TextType::class, ['empty_data' => '', 'label' => 'Sujet'])
            ->add('message', TextareaType::class, ['empty_data' => '', 'label' => 'Message'])
            ->add('rgpd', CheckboxType::class, [
                    'label'    => 'J\'accepte la politique de confidentialité',
                    'required' => true,
                ])
            ->add('save', SubmitType::class, ['label' => 'Envoyer le message'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactDTO::class,
        ]);
    }
}
