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
 * Class VideoCategory
 *
 * @property \App\Models\VideoCategory $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class VideoCategory extends Section implements Initializable
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
    protected $title="Video Category";

    /**
     * @var string
     */
    protected $alias='video-category';

    public function initialize()
    {
        app()->booted(function () {
            \AdminNavigation::getPages()->findById('video-section')->addPage(
                $this->makePage(
                    6,
                    function () {
                        return \App\Models\VideoCategory::count();
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
            ->setColumns([
                AdminColumn::text('id', 'Id'),
                AdminColumn::text('title', 'Title'),
                AdminColumn::lists('videos.title', 'Videos')->setWidth('600px'),
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
            AdminFormElement::text('title', 'Title')->required()->unique(),
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
        //
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        //
    }
}
