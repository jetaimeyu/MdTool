<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Member\ImportAction;
use App\Models\MainFactory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MainFactoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MainFactory';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MainFactory());
        $grid->column('id', __('Id'));
        $grid->column('Name', __('Name'));
        $grid->column('CompID', __('CompID'));
        $grid->column('Status', __('Status'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        // 添加到列表上
        $grid->tools(function (Grid\Tools $tools) {
            $tools->append(new ImportAction());
        });
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
        $show = new Show(MainFactory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Name', __('Name'));
        $show->field('CompID', __('CompID'));
        $show->field('Status', __('Status'));
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
        $form = new Form(new MainFactory());

        $form->text('Name', __('Name'));
        $form->number('CompID', __('CompID'));
        $form->number('Status', __('Status'));

        return $form;
    }
}
