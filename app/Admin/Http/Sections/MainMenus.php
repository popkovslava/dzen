<?php

namespace App\Admin\Http\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

/**
 * Class MainMenus
 *
 * @property \App/Models/MainMenu $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class MainMenus extends Section implements Initializable
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
    protected $title = "Menu";

    /**
     * @var string
     */
    protected $alias = 'menu';

    public function initialize()
    {
        $this->addToNavigation($priority = 300, function () {
            return \App\Models\MainMenu::count();
        });
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-bars';
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
                AdminColumn::link('page.title', 'Pages')->setWidth('600px'),
                AdminColumn::custom('Published', function (\App\Models\MainMenu $model) {
                    return $model->public ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
                })->setWidth('50px')->setHtmlAttribute('class', 'text-center')->setOrderable(false),

                AdminColumn::order()
                   ->setLabel('Order')
                   ->setHtmlAttribute('class', 'text-center')
                   ->setWidth('100px')
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
            AdminFormElement::checkbox('public', 'Published'),
            AdminFormElement::select('page_id', 'Page', \App\Models\Page::class)->setDisplay('slug')->required()
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
