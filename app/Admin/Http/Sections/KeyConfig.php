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
 * Class KeyConfig
 *
 * @property \App\Models\KeyConfig $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class KeyConfig extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    protected $title = "KeyConfigs";

    /**
     * @var string
     */
    protected $alias = "key-configs";

    public function initialize()
    {
        app()->booted(function () {
            \AdminNavigation::getPages()->findById('config-section')->addPage(
                $this->makePage(
                    908,
                    function () {
                        return \App\Models\KeyConfig::count();
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
                AdminColumn::text('title', 'Title Key'),
                AdminColumn::lists('config.title', 'Config')->setWidth('600px'),
                AdminColumn::custom('Published', function (\App\Models\KeyConfig $model) {
                    return $model->public ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
                })->setWidth('50px')->setHtmlAttribute('class', 'text-center')->setOrderable(false)

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
            AdminFormElement::checkbox('public', 'Published'),
            AdminFormElement::text('title', 'Title Key')->required()->unique()
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
