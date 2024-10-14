<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class AnimalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animal::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Animal')
            ->setEntityLabelInPlural('Animaux')
            // ...
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Prénom de l\'animal'),
            ChoiceField::new('breed')->setLabel('Race de l\'animal'),
            //AssociationField::new('breed'),
            ChoiceField::new('habitat')
                ->setRequired(true)
                ->setChoices([
                    'Savane' => 'savannah',
                    'Jungle' => 'jungle',
                    'Marais' => 'Marsh',
                ]),
            ImageField::new('images')
                ->setUploadDir('assets/images/animaux/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
        ];
    }
}
