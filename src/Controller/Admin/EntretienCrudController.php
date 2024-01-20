<?php

namespace App\Controller\Admin;

use App\Entity\Entretien;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class EntretienCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Entretien::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            'date',
            'sujet',
            'solution',
            AssociationField::new('fidele')->autocomplete(),
        ];
    }
}
