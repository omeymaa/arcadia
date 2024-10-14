<?php

namespace App\Controller\Admin;

use App\Entity\Breed;
use App\Entity\Animal;
use App\Entity\Habitat;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

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
            TextField::new('name', 'Prénom de l\'animal'),
            AssociationField::new('breed', 'Race de l\'animal')
                ->setFormTypeOption(
                    'choice_label',
                    fn (Breed $breed) => $breed->getName() . ' - Famille des ' . $breed->getFamily() 
                ),
            AssociationField::new('habitat', 'Habitat'),
            ImageField::new('images', 'Image')
                ->setUploadDir('assets/images/animaux/')
                ->setBasePath('/assets/images/animaux/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
        ];
    }
}
