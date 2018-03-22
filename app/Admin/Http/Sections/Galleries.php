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
 * Class Galleries
 *
 * @property \App/Models/Gallery $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Galleries extends Section implements Initializable
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
    protected $title = 'Galleries';

    /**
     * @var string
     */
    protected $alias = 'galleries';

    public function initialize()
    {
        app()->booted(function () {
            \AdminNavigation::getPages()->findById('galleries-section')->addPage(
                $this->makePage(
                    901,
                    function () {
                        return \App\Models\Gallery::count();
                    }
                )
            );
        });
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return 'fa fa-camera';
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
                AdminColumn::lists('slides.id', 'Img ID')->setWidth('600px'),
                AdminColumn::custom('Shuffle', function (\App\Models\Gallery $model) {
                    return $model->shuffle ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
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
            AdminFormElement::checkbox('shuffle', 'Shuffle'),
            AdminFormElement::text('title', 'Title')->required()->unique(),
            AdminFormElement::text('url', 'Link'),
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
