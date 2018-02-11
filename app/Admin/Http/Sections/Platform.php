<?php namespace App\Admin\Http\Sections;

use App\Models\AdType;
use App\Models\User\Publisher;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;
use AdminColumnEditable;

class Platform extends Section
{
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary table-bordered')
            ->setColumns([
                AdminColumn::relatedLink('publisher.name', 'Publisher'),
                AdminColumn::text('adType.name', 'Type'),
                AdminColumn::relatedLink('region.name', 'Region'),
                AdminColumn::relatedLink('category.name', 'Category'),
                AdminColumnEditable::checkbox('is_active', 'Active'),
                AdminColumn::url('url', 'platform url'),
            ]);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()
            ->addBody([
                AdminFormElement::select('user_id', 'Publisher', Publisher::class)->setDisplay('name')->required(),
                AdminFormElement::select('ad_type_id', 'Ad Type', AdType::class)->setDisplay('name'),
                AdminFormElement::select('region.name', 'Region')->setDisplay('name')->required(),
                AdminFormElement::select('category.name', 'Category')->setDisplay('name')->required(),
                AdminFormElement::checkbox('is_active', 'Activity')->required(),
                AdminFormElement::text('url', 'platform url')
            ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    public function onDelete()
    {

    }
}