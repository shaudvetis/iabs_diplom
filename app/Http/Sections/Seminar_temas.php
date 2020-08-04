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


class Seminar_temas extends Section implements  Initializable
{
   protected $model = 'App\ModelSeminar\Seminar_Tema';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500);

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
            //...
        });
    }


    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Семинар Темы';

    /**
     * @var string
     */
    protected $alias = 'seminar_tema';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync()->setColumns([
            AdminColumn::text('id')->setLabel('#'),
            AdminColumn::link('id_seminar')->setLabel('Напрямок'),
            AdminColumn::link('npp')->setLabel('Нумерация'),
            AdminColumn::link('element')->setLabel('єлемент'),
            AdminColumn::link('tema')->setLabel('назва'),
            AdminColumn::link('pract_nav')->setLabel('Практичні навички'),
            AdminColumn::link('teor_nav')->setLabel('Напрямок'),
           
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
            AdminFormElement::text('id_seminar')->setLabel('№ модуля ')->required(),
            AdminFormElement::text('npp')->setLabel('Нумерация'),
            AdminFormElement::text('element')->setLabel('елемент'),
            AdminFormElement::ckeditor('tema')->setLabel('назва'),
            AdminFormElement::ckeditor('pract_nav')->setLabel('Практичні навички'),
            AdminFormElement::text('teor_nav')->setLabel('Напрямок: 1-Введення в хірургію; 2-Абдомінальна хірургія; 3-Торакальна хірургія; 4-Проктологія; 5-Урологія; 6-Судинна хірургія; 7-Гнійна хірургія; 8-Кардіохірургія; 9-Опіки;'),
            AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1)

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

     // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}
