<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs')
            // ...
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstname')->setLabel('Prénom'),
            TextField::new('lastname')->setLabel('Nom'),
            EmailField::new('email')->setLabel('E-mail'),
            TextField::new('plainPassword', 'password')
                ->setLabel('Mot de passe')
                ->setFormType(PasswordType::class)
                ->setFormTypeOption('mapped', false)
                ->setFormTypeOption('required', true)
                ->setFormTypeOption('hash_property_path', 'password')
                ->onlyOnForms(),
            ChoiceField::new('role')
            ->setLabel('Rôle')
            ->setChoices([
                'Employé' => 'ROLE_EMPLOYEE',
                'Vétérinaire' => 'ROLE_VETERINARY',
            ])
            ->allowMultipleChoices(false)
            ->renderExpanded(false),
        ];
    }
    
}
