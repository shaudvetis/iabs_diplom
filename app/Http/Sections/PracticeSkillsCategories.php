<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;

/**
 * Class PracticeSkillsCategories
 *
 * @property \App\PracticeSkillsCategory $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class PracticeSkillsCategories extends Section
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
    protected $title = 'Practice Skills Категории';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    
/**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync()->setColumns([
            AdminColumn::text('id')->setLabel('#'),
            AdminColumn::link('title')->setLabel('Настройка')
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
        return AdminForm::panel()->addBody([
           AdminFormElement::text('title', 'Название категории')->required(),
           AdminFormElement::text('id', 'ID')->setReadonly(1),
          AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1),

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

    public function getCreateTitle()
    {
        return 'Создание Категорий';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}
