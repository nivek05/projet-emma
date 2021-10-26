<?php

namespace App\Controller\Admin;

use App\Entity\Content;
use App\Repository\CategoryRepository;



use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use App\Field\VichImageField;


class ContentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Content::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('title'),
            TextEditorField::new('description'),
            //TextareaField::new('imageFile')
                //->setFormType(    ::class)
                //->setEntryType(VichImageType::class)
                //->setBasePath ( '/uploads/photos/' )
                //->setUploadDir('\public\upload\images')
                
               // ->setLabel('Image')
           
            //TextField::new('file')->setBasePath('/upload/images')->onlyOnDetail(),
            TextField::new('imageFile')->setFormType(VichFileType::class, [
                'label' => 'supprimer?'
            ])->onlyOnForms(),
            Field::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('image')
                ->setUploadDir('\public\upload\images')
                ->onlyOnForms()
                ->setLabel('Image')
            ,
               // ->setFormType(CKEditor::class) // use CKeditor,
            AssociationField::new('category', 'Category')
            
        ];
    }
    
}
