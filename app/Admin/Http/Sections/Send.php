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
use SleepingOwl\Admin\Model\ModelConfiguration;
use SleepingOwl\Admin\Section;

/**
 * Class Send
 *
 * @property \App\Models\Send $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Send extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = true;

    /**
     * @var string
     */
    protected $title="Email from client";

    /**
     * @var string
     */
    protected $alias = "email_client";

    public function initialize()
    {
        app()->booted(function () {
            \AdminNavigation::getPages()->findById('email')->addPage(
                $this->makePage(
                    904,
                    function () {
                        return \App\Models\Send::count();
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
        $display= AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::text('id', 'Id'),
                AdminColumn::text('firstName', 'First Name'),
                AdminColumn::text('lastName', 'Last Name'),
                AdminColumn::text('email', 'Email')
            ])->paginate(20);

        return $display;
    }


    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $return=AdminForm::panel()->addBody([
            AdminFormElement::text('lastName', 'Last Name'),
            AdminFormElement::text('phone', 'Phone'),
            AdminFormElement::text('email', 'Email'),
            AdminFormElement::text('yourPosition', 'Your Position'),
            AdminFormElement::text('hearAboutUs', 'Hear AboutUs'),
            AdminFormElement::ckeditor('messages', 'Messages'),
            AdminColumn::custom('URL', function (\App\Models\Send $model) {
                if ($model->files) {
                    echo "<div class=\"panel-group\">
                          <div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                              <h4 class=\"panel-title text-center\">
                                <a data-toggle=\"collapse\" href=\"#collapse1\">Files Download</a>
                              </h4>
                            </div>
                            <div id=\"collapse1\" class=\"panel-collapse collapse\">
                              <ul class=\"list-group\">";
                    foreach ($model->files as $item) {
                        echo "<li class='list-group-item'><a href='$item->fileUrl' download>$item->fileName</a></li>";
                    }
                    echo "</ul>
                            </div>
                        </div>
                    </div>";
                }
            })->setWidth('50px')
        ]);

        return $return;
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
