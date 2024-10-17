<?php

namespace App\Controller\Admin;

use App\Entity\VeterinaryVisit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Validator\Constraints\Date;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class VeterinaryVisitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VeterinaryVisit::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Information sur l\'animal')
            ->setEntityLabelInPlural('Informations sur les animaux')
            // ...
        ;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('animal', 'Nom de l\'animal'),
            TextField::new('animalCondition', 'Etat de l\'animal'),
            TextField::new('foodProvided', 'Nourriture proposée'),
            NumberField::new('foodWeight', 'Grammage de la nourriture')
                ->setDecimalSeparator(',')
                ->setNumDecimals(2),
            DateField::new('date', 'Date de passage'),
            TextareaField::new('animalConditionDetails', 'Détails de l\'état de l\'animal')
        ];
    }
}
