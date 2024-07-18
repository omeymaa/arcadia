<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateurs')
            ->setEntityLabelInSingular('Utilisateur')
            // ...
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstname')->setLabel('Prénom'),
            TextField::new('lastname')->setLabel('Nom'),
            EmailField::new('email')->setLabel('E-mail'),
            TextField::new('password')->setLabel('Mot de passe')->onlyOnForms(),
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
