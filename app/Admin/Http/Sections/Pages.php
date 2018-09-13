<?php

namespace App\Admin\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Work;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

/**
 * Class Pages
 *
 * @property \App/Models/Page $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Pages extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = "Pages";

    /**
     * @var string
     */
    protected $alias = "pages";

    public function initialize()
    {
        $this->addToNavigation($priority = 200, function () {
            return \App\Models\Page::count();
        });
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-file-text-o';
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::text('id', 'Id'),
                AdminColumn::text('title', 'Title'),
                AdminColumn::text('slug', 'Alias'),
                AdminColumn::relatedLink('work.title_single', 'Works')->setWidth('300px'),
                AdminColumn::custom('Published', function (\App\Models\Page $model) {
                    return $model->public ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
                })->setWidth('50px')->setHtmlAttribute('class', 'text-center')->setOrderable(false),
                AdminColumn::custom('Main', function (\App\Models\Page $model) {
                    return $model->main_page ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
                })->setWidth('50px')->setHtmlAttribute('class', 'text-center')->setOrderable(false),

            ])->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::checkbox('main_page', 'Main page')->setDefaultValue(false),
            AdminFormElement::checkbox('public', 'Published'),
            AdminFormElement::textaddon('slug', 'Url')
                ->setAddon(\Request::getHttpHost() . '/')
                ->placeBefore()->required(),
            AdminFormElement::text('title', 'Title')->unique(),
            AdminFormElement::text('description', 'Description'),
            AdminFormElement::text('keywords', 'Keywords'),
            AdminFormElement::select('work_id', 'Work', \App\Models\Work::class)->setDisplay('title_single'),
            AdminFormElement::ckeditor('text', 'Page Code'),
            AdminFormElement::select(
                'clients_section_category_id',
                'Clients Block',
                \App\Models\ClientsSectionCategory::class
            )->setDisplay('title'),
            AdminFormElement::select('clients_section_id', 'Client One', \App\Models\ClientsSection::class)
                ->setLoadOptionsQueryPreparer(function ($element, $query) {
                    return $query->where(
                        'clients_section_category_id',
                        $element->getModel()->clients_section_category_id
                    );
                })->setDisplay('name'),
            AdminFormElement::select('gallery_id', 'Gallery', \App\Models\Gallery::class)->setDisplay('title'),
            AdminFormElement::select('video_category_id', 'Video Category', \App\Models\VideoCategory::class)
                ->setDisplay('title'),
            AdminFormElement::select('banner_bottom_id', 'Banner Bottom', \App\Models\BannerBottom::class)
                ->setDisplay('title')
        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
