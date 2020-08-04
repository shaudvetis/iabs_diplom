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


class Seminarus extends Section implements  Initializable
{
   protected $model = 'App\ModelSeminar\Seminarus';

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
    protected $title = 'Семинар';

    /**
     * @var string
     */
    protected $alias = 'seminarus';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync()->setColumns([
            AdminColumn::text('id')->setLabel('#'),
            AdminColumn::link('direction', \App\ModelSeminar\Napravleniya::class)->setLabel('Напрямок'),
            AdminColumn::link('element')->setLabel('єлемент'),
            AdminColumn::link('npp')->setLabel('npp'),
            AdminColumn::link('seminar_title')->setLabel('назва'),
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
            AdminFormElement::text('title', 'Название страницы')->required(),
            AdminFormElement::text('id', 'ID')->setReadonly(1),
            AdminFormElement::text('slug', 'URL страницы')->unique()->required(),
            AdminFormElement::ckeditor('seminar_title')->setLabel('Создано'),
             AdminFormElement::ckeditor('element')->setLabel('єлемент'),
              AdminColumn::text('npp')->setLabel('npp'),
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
