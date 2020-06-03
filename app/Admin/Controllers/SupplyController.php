<?php

namespace App\Admin\Controllers;

use App\Models\Supply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SupplyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Supply';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Supply());

        $grid->column('id', __('Id'));
        $grid->column('SupplyName', __('SupplyName'));
        $grid->column('SupplyNumber', __('SupplyNumber'));
        $grid->column('SupplyItemID', __('SupplyItemID'));
        $grid->column('Status', __('Status'));
        $grid->column('MainFactoryCompID', __('MainFactoryCompID'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Supply::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('SupplyName', __('SupplyName'));
        $show->field('SupplyNumber', __('SupplyNumber'));
        $show->field('SupplyItemID', __('SupplyItemID'));
        $show->field('Status', __('Status'));
        $show->field('MainFactoryCompID', __('MainFactoryCompID'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Supply());

        $form->text('SupplyName', __('SupplyName'));
        $form->text('SupplyNumber', __('SupplyNumber'));
        $form->text('SupplyItemID', __('SupplyItemID'));
        $form->number('Status', __('Status'));
        $form->number('MainFactoryCompID', __('MainFactoryCompID'));

        return $form;
    }
}
