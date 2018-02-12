<?php namespace App\Admin\Http\Sections;

use App\Models\AdType;
use App\Models\User\Publisher;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use App\Models\Region;
use App\Models\Category;
use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;
use AdminColumnEditable;

class Place extends Section
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
                AdminColumn::text('name', 'Name'),
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
                AdminFormElement::text('name', 'Name'),
                AdminFormElement::select('user_id', 'Publisher', Publisher::class)->setDisplay('name')->required(),
                AdminFormElement::select('ad_type_id', 'Ad Type', AdType::class)->setDisplay('name'),
                AdminFormElement::select('region_id', 'Region', Region::class)->setDisplay('name')->required(),
                AdminFormElement::select('category_id', 'Category', Category::class)->setDisplay('name')->required(),
                AdminFormElement::text('url', 'place url'),
                AdminFormElement::checkbox('is_active', 'Activity')->required(),
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