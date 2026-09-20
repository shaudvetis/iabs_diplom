<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;


use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class OperationSkillsCategories
 *
 * @property \App\OperationSkillsCategory $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class TeacherNameSection extends Section
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
    protected $title = 'Викладачі';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync()->setColumns([
              AdminColumn::link('namelong')->setLabel('ПІБ')
        ]);
        $display->paginate(15);
        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
         return AdminForm::panel()->addBody(
            AdminFormElement::text('position')->setLabel('посада'),
            AdminFormElement::text('namelong')->setLabel('ПІБ')->required()->unique()
        );
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
