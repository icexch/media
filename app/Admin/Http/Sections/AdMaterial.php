<?php namespace App\Admin\Http\Sections;

use App\Models\AdType;
use App\Models\User\Advertiser;
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

class AdMaterial extends Section
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
                AdminColumn::link('name', 'Name'),
                AdminColumn::relatedLink('advertiser.name', 'Advertiser'),
                AdminColumn::text('adType.name', 'Type'),
                AdminColumn::relatedLink('region.name', 'Region'),
                AdminColumn::relatedLink('category.name', 'Category'),
                AdminColumn::text('cpc', 'CPC'),
                AdminColumn::text('cpc_value', 'Value of cpc'),
                AdminColumn::text('cpv', 'CPV'),
                AdminColumn::text('cpv_value', 'Value of cpv'),
                AdminColumnEditable::checkbox('is_active', 'Active')
            ])->setApply([
                function ($query) {
                    $query->orderBy('is_active', 'asc');
                }
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
                AdminFormElement::text('name', 'Name')->required(),
                AdminFormElement::select('user_id', 'Advertiser', Advertiser::class)->setDisplay('name')->required(),
                AdminFormElement::select('ad_type_id', 'Ad Type', AdType::class)->setDisplay('name')->required(),
                AdminFormElement::select('region_id', 'Region', Region::class)->setDisplay('name')->required(),
                AdminFormElement::select('category_id', 'Category', Category::class)->setDisplay('name')->required(),
                AdminFormElement::text('cpc', 'CPC')->addValidationRule('numeric')->required(),
                AdminFormElement::text('cpc_value', 'Value of cpc')->addValidationRule('integer')->required(),
                AdminFormElement::text('cpv', 'CPV')->addValidationRule('numeric')->required(),
                AdminFormElement::text('cpv_value', 'Value of cpv')->addValidationRule('numeric')->required(),
                AdminFormElement::textarea('content', 'Content'),
                AdminFormElement::checkbox('is_active', 'Active')
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