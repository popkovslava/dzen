<?php

namespace App\Admin\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class link
 *
 * @property \App\Models\Link $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Link extends Section implements Initializable
{


    protected $checkAccess = false;
    /**
     * @var string
     */
    protected $title = "Button";

    /**
     * @var string
     */
    protected $alias = "links";

    public function initialize()
    {
        app()->booted(function () {
            \AdminNavigation::getPages()->findById('elements')->addPage(
                $this->makePage(
                    904,
                    function () {
                        return \App\Models\Link::count();
                    }
                )
            );
        });
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setApply(function ($query) {
                $query->orderBy('position', 'asc');
            })
            ->setColumns([
                AdminColumn::text('id', 'Id'),
                AdminColumn::text('title', 'Title'),
                AdminColumn::url('url', 'Url'),
                AdminColumn::order()
                    ->setLabel('Order')
                    ->setHtmlAttribute('class', 'text-center')
                    ->setWidth('100px'),
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
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::text('position', 'Position'),
            AdminFormElement::text('url', 'Url'),
            AdminFormElement::select('page_id', 'Page Link', \App\Models\Page::class)->setDisplay('slug')
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
