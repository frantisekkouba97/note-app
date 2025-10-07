<?php

namespace App\Controller\Admin\Crud;

use App\Entity\Note;
use App\Enum\Priority;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;

class NoteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Note::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->onlyOnIndex();
        yield TextField::new('title', 'Název');
        yield TextEditorField::new('content', 'Obsah');
        yield ChoiceField::new('priority', 'Priorita')
            ->setChoices(Priority::choices())
            ->renderExpanded(false)
            ->allowMultipleChoices(false);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(ChoiceFilter::new('priority', 'Priorita')->setChoices(Priority::choices()));
    }
}
