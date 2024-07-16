<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;


class ContactDTO
{
    public string $firstname = '';

    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 50)]
    public string $lastname = '';
    
    #[Assert\NotBlank]
    #[Assert\Email]
    public string $email = '';

    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 50)]
    public string $subject = '';

    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 200)]
    public string $message = '';

    public string $rgpd;
    
    
    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('firstname', new Assert\Length([
            'min' => 2,
            'max' => 50,
            'minMessage' => 'Your first name must be at least {{ limit }} characters long',
            'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters',
        ]));

        $metadata->addPropertyConstraint('lastname', new Assert\Length([
            'min' => 2,
            'max' => 50,
            'minMessage' => 'Your first name must be at least {{ limit }} characters long',
            'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters',
        ]));
    }
}

