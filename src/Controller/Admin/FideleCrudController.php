<?php

namespace App\Controller\Admin;

use App\Entity\Fidele;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;



class FideleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fidele::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    public function configureFields(string $pageName): iterable
    {
        return [
            'nom',
            'prenoms',
            'contact',
            'quartier',
            'profession',
            NumberField::new('anneeDeSalut'),
            'dateNaissance',
            ChoiceField::new('lieuCellule')->setChoices([
                // $value => $badgeStyleName
                'Agbata' => 'Agbata',
                'Avepozo' => 'Avepozo',
                'Baguida' => 'Baguida',
                'Adamavo' => 'Adamavo',
                'Agodeke' => 'Agodeke',
            ]),
            /*ImageField::new('imageName')
                ->onlyOnIndex()
                ->setBasePath('/images/photos'),
            ImageField::new('imageFile')
                ->onlyOnForms()
                ->setFormType(VichImageType::class)
                ->setBasePath('/images/photos') // Define the base path for displaying images
                ->onlyOnDetail()
                ->onlyOnForms(),*/
        ];
    }
}
