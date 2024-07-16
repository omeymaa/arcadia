<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class ContactDTO
{
    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Votre prénom doit comporter au moins {{ limit }} caractères',
        maxMessage: 'Votre prénom ne peut pas dépasser {{ limit }} caractères',
    )]
    public string $firstname = '';

    #[Assert\NotBlank]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Votre nom doit comporter au moins {{ limit }} caractères',
        maxMessage: 'Votre nom ne peut pas dépasser {{ limit }} caractères',
    )]
    public string $lastname = '';
    
    #[Assert\NotBlank]
    #[Assert\Email(
        message: 'Votre e-mail n\'est pas un email valide.',
    )]
    public string $email = '';

    #[Assert\NotBlank]
    #[Assert\Length(
        min: 5,
        max: 50,
        minMessage: 'Le sujet doit comporter au moins {{ limit }} caractères',
        maxMessage: 'Le sujet ne peut pas dépasser {{ limit }} caractères',
    )]
    public string $subject = '';

    #[Assert\NotBlank]
    #[Assert\Length(
        min: 5,
        max: 300,
        minMessage: 'Le message doit comporter au moins {{ limit }} caractères',
        maxMessage: 'Le message ne peut pas dépasser {{ limit }} caractères',
    )]
    public string $message = '';

    public string $rgpd;
}